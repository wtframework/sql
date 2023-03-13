<?php

declare(strict_types=1);

use WTFramework\SQL\Window;

it('can get', function ()
{

  expect((string) new Window)
  ->toEqual('');

});

it('can use window name', function ()
{

  expect((string) new Window('w'))
  ->toEqual('w');

});

it('can use partition by column', function ()
{

  expect(
    (string) (new Window)
    ->partitionBy('test')
  )
  ->toEqual('PARTITION BY test');

  expect(
    (string) (new Window)
    ->partitionBy(['test1', 'test2'])
  )
  ->toEqual('PARTITION BY test1, test2');

});

it('can use order by column', function ()
{

  expect(
    (string) (new Window)
    ->orderBy('test')
  )
  ->toEqual('ORDER BY test ASC');

});

it('can use range', function ()
{

  expect(
    (string) (new Window)
    ->range()
  )
  ->toEqual('RANGE');

});

it('can use rows', function ()
{

  expect(
    (string) (new Window)
    ->rows()
  )
  ->toEqual('ROWS');

});

it('can use groups', function ()
{

  expect(
    (string) (new Window)
    ->groups()
  )
  ->toEqual('GROUPS');

});

it('can use unbounded preceding', function ()
{

  expect(
    (string) (new Window)
    ->unbounded()
  )
  ->toEqual('UNBOUNDED PRECEDING');

});

it('can use expression preceding', function ()
{

  expect(
    (string) (new Window)
    ->preceding(1)
  )
  ->toEqual('1 PRECEDING');

});

it('can use current row', function ()
{

  expect(
    (string) (new Window)
    ->currentRow()
  )
  ->toEqual('CURRENT ROW');

});

it('can use between', function ()
{

  expect(
    (string) (new Window)
    ->between()
  )
  ->toEqual('BETWEEN');

});

it('can use between unbounded preceding', function ()
{

  expect(
    (string) (new Window)
    ->betweenUnbounded()
  )
  ->toEqual('BETWEEN UNBOUNDED PRECEDING');

});

it('can use between expression preceding', function ()
{

  expect(
    (string) (new Window)
    ->betweenPreceding(1)
  )
  ->toEqual('BETWEEN 1 PRECEDING');

});

it('can use between current row', function ()
{

  expect(
    (string) (new Window)
    ->betweenCurrentRow()
  )
  ->toEqual('BETWEEN CURRENT ROW');

});

it('can use between expression following', function ()
{

  expect(
    (string) (new Window)
    ->betweenFollowing(1)
  )
  ->toEqual('BETWEEN 1 FOLLOWING');

});

it('can use and expression preceding', function ()
{

  expect(
    (string) (new Window)
    ->andPreceding(1)
  )
  ->toEqual('BETWEEN AND 1 PRECEDING');

});

it('can use and current row', function ()
{

  expect(
    (string) (new Window)
    ->andCurrentRow()
  )
  ->toEqual('BETWEEN AND CURRENT ROW');

});

it('can use and expression following', function ()
{

  expect(
    (string) (new Window)
    ->andFollowing(1)
  )
  ->toEqual('BETWEEN AND 1 FOLLOWING');

});

it('can use and unbounded following', function ()
{

  expect(
    (string) (new Window)
    ->andUnbounded()
  )
  ->toEqual('BETWEEN AND UNBOUNDED FOLLOWING');

});

it('can exclude no others', function ()
{

  expect(
    (string) (new Window)
    ->excludeNoOthers()
  )
  ->toEqual('EXCLUDE NO OTHERS');

});

it('can exclude current row', function ()
{

  expect(
    (string) (new Window)
    ->excludeCurrentRow()
  )
  ->toEqual('EXCLUDE CURRENT ROW');

});

it('can exclude group', function ()
{

  expect(
    (string) (new Window)
    ->excludeGroup()
  )
  ->toEqual('EXCLUDE GROUP');

});

it('can exclude ties', function ()
{

  expect(
    (string) (new Window)
    ->excludeTies()
  )
  ->toEqual('EXCLUDE TIES');

});