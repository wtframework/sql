<?php

declare(strict_types=1);

use WTFramework\SQL\Table;

it('can get', function ()
{

  expect((string) new Table('test'))
  ->toEqual('test');

});

it('can get with alias', function ()
{

  expect((string) new Table(
    'test',
    't1'
  ))
  ->toEqual('test AS t1');

});

it('can get partition', function ()
{

  expect(
    (string) (new Table('test'))
    ->partition('p1')
  )
  ->toEqual('test PARTITION (p1)');

  expect(
    (string) (new Table('test'))
    ->partition(['p1', 'p2'])
  )
  ->toEqual('test PARTITION (p1, p2)');

});

it('can get partition with alias', function ()
{

  expect(
    (string) (new Table(
      'test',
      't1'
    ))
    ->partition('p1')
  )
  ->toEqual('test PARTITION (p1) AS t1');

});

it('can get only', function ()
{

  expect(
    (string) (new Table('test'))
    ->only()
  )
  ->toEqual('ONLY test');

});

it('can use index', function ()
{

  expect(
    (string) (new Table('test'))
    ->useIndex('test')
  )
  ->toEqual('test USE INDEX (test)');

  expect(
    (string) (new Table('test'))
    ->useIndex(['test1', 'test2'])
  )
  ->toEqual('test USE INDEX (test1, test2)');

});

it('can use index for join', function ()
{

  expect(
    (string) (new Table('test'))
    ->useIndexForJoin('test1')
  )
  ->toEqual('test USE INDEX FOR JOIN (test1)');

});

it('can use index for order by', function ()
{

  expect(
    (string) (new Table('test'))
    ->useIndexForOrderBy('test1')
  )
  ->toEqual('test USE INDEX FOR ORDER BY (test1)');

});

it('can use index for group by', function ()
{

  expect(
    (string) (new Table('test'))
    ->useIndexForGroupBy('test1')
  )
  ->toEqual('test USE INDEX FOR GROUP BY (test1)');

});

it('can ignore index', function ()
{

  expect(
    (string) (new Table('test'))
    ->ignoreIndex('test')
  )
  ->toEqual('test IGNORE INDEX (test)');

});

it('can ignore index for join', function ()
{

  expect(
    (string) (new Table('test'))
    ->ignoreIndexForJoin('test1')
  )
  ->toEqual('test IGNORE INDEX FOR JOIN (test1)');

});

it('can ignore index for order by', function ()
{

  expect(
    (string) (new Table('test'))
    ->ignoreIndexForOrderBy('test1')
  )
  ->toEqual('test IGNORE INDEX FOR ORDER BY (test1)');

});

it('can ignore index for group by', function ()
{

  expect(
    (string) (new Table('test'))
    ->ignoreIndexForGroupBy('test1')
  )
  ->toEqual('test IGNORE INDEX FOR GROUP BY (test1)');

});

it('can force index', function ()
{

  expect(
    (string) (new Table('test'))
    ->forceIndex('test')
  )
  ->toEqual('test FORCE INDEX (test)');

});

it('can force index for join', function ()
{

  expect(
    (string) (new Table('test'))
    ->forceIndexForJoin('test1')
  )
  ->toEqual('test FORCE INDEX FOR JOIN (test1)');

});

it('can force index for order by', function ()
{

  expect(
    (string) (new Table('test'))
    ->forceIndexForOrderBy('test1')
  )
  ->toEqual('test FORCE INDEX FOR ORDER BY (test1)');

});

it('can force index for group by', function ()
{

  expect(
    (string) (new Table('test'))
    ->forceIndexForGroupBy('test1')
  )
  ->toEqual('test FORCE INDEX FOR GROUP BY (test1)');

  expect(
    (string) (new Table('test'))
    ->useIndex('test1')
    ->ignoreIndex('test2')
    ->forceIndex('test3')
  )
  ->toEqual('test USE INDEX (test1) IGNORE INDEX (test2) FORCE INDEX (test3)');

});