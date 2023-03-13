<?php

declare(strict_types=1);

use WTFramework\SQL\Index;

it('can get', function ()
{

  expect(
    (string) (new Index)
  )
  ->toEqual('INDEX');

});

it('can set as fulltxt', function ()
{

  expect(
    (string) (new Index('test'))
    ->fullText()
  )
  ->toEqual('FULLTEXT INDEX test');

});

it('can set as spatial', function ()
{

  expect(
    (string) (new Index('test'))
    ->spatial()
  )
  ->toEqual('SPATIAL INDEX test');

});

it('can set if not exists', function ()
{

  expect(
    (string) (new Index('test'))
    ->ifNotExists()
  )
  ->toEqual('INDEX IF NOT EXISTS test');

});

it('can set using btree', function ()
{

  expect(
    (string) (new Index('test'))
    ->usingBTree()
  )
  ->toEqual('INDEX test USING BTREE');

});

it('can set using hash', function ()
{

  expect(
    (string) (new Index('test'))
    ->usingHash()
  )
  ->toEqual('INDEX test USING HASH');

});

it('can set using rtree', function ()
{

  expect(
    (string) (new Index('test'))
    ->usingRTree()
  )
  ->toEqual('INDEX test USING RTREE');

});

it('can set column', function ()
{

  expect(
    (string) (new Index('test'))
    ->column('test2')
  )
  ->toEqual('INDEX test (test2)');

});

it('can set multiple columns', function ()
{

  expect(
    (string) (new Index('test'))
    ->column(['test2', 'test3'])
  )
  ->toEqual('INDEX test (test2, test3)');

});

it('can set key block size', function ()
{

  expect(
    (string) (new Index('test'))
    ->keyBlockSize(1)
  )
  ->toEqual('INDEX test KEY_BLOCK_SIZE 1');

});

it('can set with parser', function ()
{

  expect(
    (string) (new Index('test'))
    ->withParser('test')
  )
  ->toEqual('INDEX test WITH PARSER test');

});

it('can set comment', function ()
{

  expect(
    (string) (new Index('test'))
    ->comment("test 'test'")
  )
  ->toEqual("INDEX test COMMENT 'test ''test'''");

});

it('can set clustering on', function ()
{

  expect(
    (string) (new Index('test'))
    ->clustering()
  )
  ->toEqual("INDEX test CLUSTERING = YES");

});

it('can set clustering off', function ()
{

  expect(
    (string) (new Index('test'))
    ->noClustering()
  )
  ->toEqual("INDEX test CLUSTERING = NO");

});

it('can set ignored', function ()
{

  expect(
    (string) (new Index('test'))
    ->ignored()
  )
  ->toEqual("INDEX test IGNORED");

});

it('can set not ignored', function ()
{

  expect(
    (string) (new Index('test'))
    ->notIgnored()
  )
  ->toEqual("INDEX test NOT IGNORED");

});

it('can set invisible', function ()
{

  expect(
    (string) (new Index('test'))
    ->invisible()
  )
  ->toEqual("INDEX test INVISIBLE");

});

it('can set not invisible', function ()
{

  expect(
    (string) (new Index('test'))
    ->notInvisible()
  )
  ->toEqual("INDEX test NOT INVISIBLE");

});

it('can set visible', function ()
{

  expect(
    (string) (new Index('test'))
    ->visible()
  )
  ->toEqual("INDEX test VISIBLE");

});

it('can set engine attribute', function ()
{

  expect(
    (string) (new Index('test'))
    ->engineAttribute("test 'test'")
  )
  ->toEqual("INDEX test ENGINE_ATTRIBUTE = 'test ''test'''");

});

it('can set secondary engine attribute', function ()
{

  expect(
    (string) (new Index('test'))
    ->secondaryEngineAttribute("test 'test'")
  )
  ->toEqual("INDEX test SECONDARY_ENGINE_ATTRIBUTE = 'test ''test'''");

});