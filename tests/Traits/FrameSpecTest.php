<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Window;
use WTFramework\SQL\SQL;

it('can use range', function ()
{

  expect(
    (string) (new Window)
    ->range()
  )
  ->toEqual("RANGE");

});

it('can use rows', function ()
{

  expect(
    (string) (new Window)
    ->rows()
  )
  ->toEqual("ROWS");

});

it('can use groups', function ()
{

  expect(
    (string) (new Window)
    ->groups()
  )
  ->toEqual("GROUPS");

});

it('can set unbounded preceding', function ()
{

  expect(
    (string) (new Window)
    ->unbounded()
  )
  ->toEqual("UNBOUNDED PRECEDING");

});

it('can set expression preceding', function ()
{

  expect(
    (string) (new Window)
    ->preceding('test')
  )
  ->toEqual("test PRECEDING");

});

it('can set bound expression preceding', function ()
{

  expect(
    (string) $window = (new Window)
    ->preceding(SQL::bind('test'))
  )
  ->toEqual("? PRECEDING");

  expect($window->bindings())
  ->toEqual(['test']);

});

it('can set current row', function ()
{

  expect(
    (string) (new Window)
    ->currentRow()
  )
  ->toEqual("CURRENT ROW");

});

it('can set between unbounded preceding', function ()
{

  expect(
    (string) (new Window)
    ->betweenUnbounded()
  )
  ->toEqual("BETWEEN UNBOUNDED PRECEDING");

});

it('can set between expression preceding', function ()
{

  expect(
    (string) (new Window)
    ->betweenPreceding('test')
  )
  ->toEqual("BETWEEN test PRECEDING");

});

it('can set between current row', function ()
{

  expect(
    (string) (new Window)
    ->betweenCurrentRow()
  )
  ->toEqual("BETWEEN CURRENT ROW");

});

it('can set between expression following', function ()
{

  expect(
    (string) (new Window)
    ->betweenFollowing('test')
  )
  ->toEqual("BETWEEN test FOLLOWING");

});

it('can set and expression preceding', function ()
{

  expect(
    (string) (new Window)
    ->andPreceding('test')
  )
  ->toEqual("BETWEEN AND test PRECEDING");

});

it('can set and bound expression preceding', function ()
{

  expect(
    (string) $window = (new Window)
    ->andPreceding(SQL::bind('test'))
  )
  ->toEqual("BETWEEN AND ? PRECEDING");

  expect($window->bindings())
  ->toEqual(['test']);

});

it('can set and current row', function ()
{

  expect(
    (string) (new Window)
    ->andCurrentRow()
  )
  ->toEqual("BETWEEN AND CURRENT ROW");

});

it('can set and expression following', function ()
{

  expect(
    (string) (new Window)
    ->andFollowing('test')
  )
  ->toEqual("BETWEEN AND test FOLLOWING");

});

it('can set and unbounded following', function ()
{

  expect(
    (string) (new Window)
    ->andUnbounded()
  )
  ->toEqual("BETWEEN AND UNBOUNDED FOLLOWING");

});

it('can exclude no others', function ()
{

  expect(
    (string) (new Window)
    ->excludeNoOthers()
  )
  ->toEqual("EXCLUDE NO OTHERS");

});

it('can exclude current row', function ()
{

  expect(
    (string) (new Window)
    ->excludeCurrentRow()
  )
  ->toEqual("EXCLUDE CURRENT ROW");

});

it('can exclude group', function ()
{

  expect(
    (string) (new Window)
    ->excludeGroup()
  )
  ->toEqual("EXCLUDE GROUP");

});

it('can exclude ties', function ()
{

  expect(
    (string) (new Window)
    ->excludeTies()
  )
  ->toEqual("EXCLUDE TIES");

});