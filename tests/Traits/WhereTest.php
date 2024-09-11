<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;
use WTFramework\SQL\Services\Where;

it('can select where', function ()
{

  expect(
    (string) SQL::select()
    ->where('test', 1)
  )
  ->toEqual("SELECT * WHERE test = 1");

});

it('can select where empty', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->where('test', '')
  )
  ->toEqual("SELECT * WHERE test = ?");

  expect($stmt->bindings())
  ->toEqual(['']);

});

it('can select and where', function ()
{

  expect(
    (string) SQL::select()
    ->where('test1', 1)
    ->where('test2', 2)
  )
  ->toEqual("SELECT * WHERE test1 = 1 AND test2 = 2");

});

it('can select or where', function ()
{

  expect(
    (string) SQL::select()
    ->where('test1', 1)
    ->orWhere('test2', 2)
  )
  ->toEqual("SELECT * WHERE test1 = 1 OR test2 = 2");

});

it('can select where not', function ()
{

  expect(
    (string) SQL::select()
    ->whereNot('test', 1)
  )
  ->toEqual("SELECT * WHERE NOT test = 1");

});

it('can select or where not', function ()
{

  expect(
    (string) SQL::select()
    ->where('test1', 1)
    ->orWhereNot('test2', 2)
  )
  ->toEqual("SELECT * WHERE test1 = 1 OR NOT test2 = 2");

});

it('can select where using array', function ()
{

  expect(
    (string) SQL::select()
    ->where(['test' => 1])
  )
  ->toEqual("SELECT * WHERE test = 1");

});

it('can select where multiple conditions', function ()
{

  expect(
    (string) SQL::select()
    ->where([
      ['test1', '<', 1],
      ['test2', '>', 2],
    ])
  )
  ->toEqual("SELECT * WHERE test1 < 1 AND test2 > 2");

});

it('can select where using closure', function ()
{

  expect(
    (string) SQL::select()
    ->where(fn (Where $w) => $w->where('test', 1))
  )
  ->toEqual("SELECT * WHERE test = 1");

});

it('can select where exists', function ()
{

  expect(
    (string) SQL::select()
    ->whereExists('test')
  )
  ->toEqual("SELECT * WHERE EXISTS (test)");

});

it('can select or where exists', function ()
{

  expect(
    (string) SQL::select()
    ->where('test', 1)
    ->orWhereExists('test')
  )
  ->toEqual("SELECT * WHERE test = 1 OR EXISTS (test)");

});

it('can select where not exists', function ()
{

  expect(
    (string) SQL::select()
    ->whereNotExists('test')
  )
  ->toEqual("SELECT * WHERE NOT EXISTS (test)");

});

it('can select or where not exists', function ()
{

  expect(
    (string) SQL::select()
    ->where('test', 1)
    ->orWhereNotExists('test')
  )
  ->toEqual("SELECT * WHERE test = 1 OR NOT EXISTS (test)");

});

it('can select where exists subquery', function ()
{

  expect(
    (string) SQL::select()
    ->whereExists(SQL::subquery('test'))
  )
  ->toEqual("SELECT * WHERE EXISTS (test)");

});

it('can select where raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->whereRaw("FIND_IN_SET(test1, ?) = 0", 'test2')
  )
  ->toEqual("SELECT * WHERE FIND_IN_SET(test1, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});

it('can select where not raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->whereNotRaw("FIND_IN_SET(test1, ?) = 0", 'test2')
  )
  ->toEqual("SELECT * WHERE NOT FIND_IN_SET(test1, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});

it('can select or where raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->where('test1', 'test2')
    ->orWhereRaw("FIND_IN_SET(test3, ?) = 0", 'test4')
  )
  ->toEqual("SELECT * WHERE test1 = ? OR FIND_IN_SET(test3, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2', 'test4']);

});

it('can select or where not raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->where('test1', 'test2')
    ->orWhereNotRaw("FIND_IN_SET(test3, ?) = 0", 'test4')
  )
  ->toEqual("SELECT * WHERE test1 = ? OR NOT FIND_IN_SET(test3, ?) = 0");

  expect($stmt->bindings())
  ->toEqual(['test2', 'test4']);

});