<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Having;
use WTFramework\SQL\SQL;

it('can select having', function ()
{

  expect(
    (string) SQL::select()
    ->having('test', 1)
  )
  ->toEqual("SELECT * HAVING test = 1");

});

it('can select and having', function ()
{

  expect(
    (string) SQL::select()
    ->having('test1', 1)
    ->having('test2', 2)
  )
  ->toEqual("SELECT * HAVING test1 = 1 AND test2 = 2");

});

it('can select or having', function ()
{

  expect(
    (string) SQL::select()
    ->having('test1', 1)
    ->orHaving('test2', 2)
  )
  ->toEqual("SELECT * HAVING test1 = 1 OR test2 = 2");

});

it('can select having not', function ()
{

  expect(
    (string) SQL::select()
    ->havingNot('test', 1)
  )
  ->toEqual("SELECT * HAVING NOT test = 1");

});

it('can select or having not', function ()
{

  expect(
    (string) SQL::select()
    ->having('test1', 1)
    ->orHavingNot('test2', 2)
  )
  ->toEqual("SELECT * HAVING test1 = 1 OR NOT test2 = 2");

});

it('can select having using array', function ()
{

  expect(
    (string) SQL::select()
    ->having(['test' => 1])
  )
  ->toEqual("SELECT * HAVING test = 1");

});

it('can select having multiple conditions', function ()
{

  expect(
    (string) SQL::select()
    ->having([
      ['test1', '<', 1],
      ['test2', '>', 2],
    ])
  )
  ->toEqual("SELECT * HAVING test1 < 1 AND test2 > 2");

});

it('can select having using closure', function ()
{

  expect(
    (string) SQL::select()
    ->having(fn (Having $w) => $w->having('test', 1))
  )
  ->toEqual("SELECT * HAVING test = 1");

});

it('can select having exists', function ()
{

  expect(
    (string) SQL::select()
    ->havingExists('test')
  )
  ->toEqual("SELECT * HAVING EXISTS (test)");

});

it('can select or having exists', function ()
{

  expect(
    (string) SQL::select()
    ->having('test', 1)
    ->orHavingExists('test')
  )
  ->toEqual("SELECT * HAVING test = 1 OR EXISTS (test)");

});

it('can select having not exists', function ()
{

  expect(
    (string) SQL::select()
    ->havingNotExists('test')
  )
  ->toEqual("SELECT * HAVING NOT EXISTS (test)");

});

it('can select or having not exists', function ()
{

  expect(
    (string) SQL::select()
    ->having('test', 1)
    ->orHavingNotExists('test')
  )
  ->toEqual("SELECT * HAVING test = 1 OR NOT EXISTS (test)");

});

it('can select having exists subquery', function ()
{

  expect(
    (string) SQL::select()
    ->havingExists(SQL::subquery('test'))
  )
  ->toEqual("SELECT * HAVING EXISTS (test)");

});

it('can select having raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->havingRaw("FIND_IN_SET(test1, ?) = 0", 'test2')
  )
  ->toEqual("SELECT * HAVING FIND_IN_SET(test1, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});

it('can select having not raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->havingNotRaw("FIND_IN_SET(test1, ?) = 0", 'test2')
  )
  ->toEqual("SELECT * HAVING NOT FIND_IN_SET(test1, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});

it('can select or having raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->having('test1', 'test2')
    ->orHavingRaw("FIND_IN_SET(test3, ?) = 0", 'test4')
  )
  ->toEqual("SELECT * HAVING test1 = ? OR FIND_IN_SET(test3, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2', 'test4']);

});

it('can select or having not raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->having('test1', 'test2')
    ->orHavingNotRaw("FIND_IN_SET(test3, ?) = 0", 'test4')
  )
  ->toEqual("SELECT * HAVING test1 = ? OR NOT FIND_IN_SET(test3, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2', 'test4']);

});