<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can use index', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndex()
  )
  ->toEqual('test1 USE INDEX ()');

});

it('can use named index', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndex('test2')
  )
  ->toEqual('test1 USE INDEX (test2)');

});

it('can use multiple named indexes', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndex(['test2', 'test3'])
  )
  ->toEqual('test1 USE INDEX (test2, test3)');

});

it('can use index for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndexForOrderBy()
  )
  ->toEqual('test1 USE INDEX FOR ORDER BY ()');

});

it('can use named index for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndexForOrderBy('test2')
  )
  ->toEqual('test1 USE INDEX FOR ORDER BY (test2)');

});

it('can use multiple named indexes for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndexForOrderBy(['test2', 'test3'])
  )
  ->toEqual('test1 USE INDEX FOR ORDER BY (test2, test3)');

});

it('can use index for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndexForGroupBy()
  )
  ->toEqual('test1 USE INDEX FOR GROUP BY ()');

});

it('can use named index for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndexForGroupBy('test2')
  )
  ->toEqual('test1 USE INDEX FOR GROUP BY (test2)');

});

it('can use multiple named indexes for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->useIndexForGroupBy(['test2', 'test3'])
  )
  ->toEqual('test1 USE INDEX FOR GROUP BY (test2, test3)');

});

it('can ignore index', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndex()
  )
  ->toEqual('test1 IGNORE INDEX ()');

});

it('can ignore named index', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndex('test2')
  )
  ->toEqual('test1 IGNORE INDEX (test2)');

});

it('can ignore multiple named indexes', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndex(['test2', 'test3'])
  )
  ->toEqual('test1 IGNORE INDEX (test2, test3)');

});

it('can ignore index for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndexForOrderBy()
  )
  ->toEqual('test1 IGNORE INDEX FOR ORDER BY ()');

});

it('can ignore named index for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndexForOrderBy('test2')
  )
  ->toEqual('test1 IGNORE INDEX FOR ORDER BY (test2)');

});

it('can ignore multiple named indexes for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndexForOrderBy(['test2', 'test3'])
  )
  ->toEqual('test1 IGNORE INDEX FOR ORDER BY (test2, test3)');

});

it('can ignore index for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndexForGroupBy()
  )
  ->toEqual('test1 IGNORE INDEX FOR GROUP BY ()');

});

it('can ignore named index for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndexForGroupBy('test2')
  )
  ->toEqual('test1 IGNORE INDEX FOR GROUP BY (test2)');

});

it('can ignore multiple named indexes for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->ignoreIndexForGroupBy(['test2', 'test3'])
  )
  ->toEqual('test1 IGNORE INDEX FOR GROUP BY (test2, test3)');

});

it('can force index', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndex()
  )
  ->toEqual('test1 FORCE INDEX ()');

});

it('can force named index', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndex('test2')
  )
  ->toEqual('test1 FORCE INDEX (test2)');

});

it('can force multiple named indexes', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndex(['test2', 'test3'])
  )
  ->toEqual('test1 FORCE INDEX (test2, test3)');

});

it('can force index for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndexForOrderBy()
  )
  ->toEqual('test1 FORCE INDEX FOR ORDER BY ()');

});

it('can force named index for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndexForOrderBy('test2')
  )
  ->toEqual('test1 FORCE INDEX FOR ORDER BY (test2)');

});

it('can force multiple named indexes for order by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndexForOrderBy(['test2', 'test3'])
  )
  ->toEqual('test1 FORCE INDEX FOR ORDER BY (test2, test3)');

});

it('can force index for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndexForGroupBy()
  )
  ->toEqual('test1 FORCE INDEX FOR GROUP BY ()');

});

it('can force named index for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndexForGroupBy('test2')
  )
  ->toEqual('test1 FORCE INDEX FOR GROUP BY (test2)');

});

it('can force multiple named indexes for group by', function ()
{

  expect(
    (string) SQL::table('test1')
    ->forceIndexForGroupBy(['test2', 'test3'])
  )
  ->toEqual('test1 FORCE INDEX FOR GROUP BY (test2, test3)');

});