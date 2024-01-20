<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can use if', function ()
{

  expect(
    (string) SQL::select()
    ->if('test1')
  )
  ->toEqual("IF test1 SELECT *");

});

it('can use if equals', function ()
{

  expect(
    (string) SQL::select()
    ->if('test1', 'test2')
  )
  ->toEqual("IF test1 = test2 SELECT *");

});

it('can use if with defined operator', function ()
{

  expect(
    (string) SQL::select()
    ->if('test1', '<', 'test2')
  )
  ->toEqual("IF test1 < test2 SELECT *");

});

it('can use if is null', function ()
{

  expect(
    (string) SQL::select()
    ->if('test1', null)
  )
  ->toEqual("IF test1 IS NULL SELECT *");

});

it('can use if in', function ()
{

  expect(
    (string) SQL::select()
    ->if('test1', ['test2', 'test3'])
  )
  ->toEqual("IF test1 IN (?, ?) SELECT *");

});

it('can use if between', function ()
{

  expect(
    (string) SQL::select()
    ->if('test1', 'BETWEEN', ['test2', 'test3'])
  )
  ->toEqual("IF test1 BETWEEN ? AND ? SELECT *");

});

it('can use if with subquery', function ()
{

  expect(
    (string) SQL::select()
    ->if(SQL::select(), SQL::select())
  )
  ->toEqual("IF (SELECT *) = (SELECT *) SELECT *");

  expect(
    (string) SQL::select()
    ->if(SQL::select(), '=', SQL::select())
  )
  ->toEqual("IF (SELECT *) = (SELECT *) SELECT *");

});

it('can use if else', function ()
{

  expect(
    (string) SQL::select()
    ->if('test1')
    ->else(SQL::select())
  )
  ->toEqual("IF test1 SELECT * ELSE SELECT *");

});

it('can use if else with bound parameters', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->if(
      SQL::select()
      ->where('test1', 'test1')
    )
    ->else(
      SQL::select()
      ->where('test2', 'test2')
    )
  )
  ->toEqual(
    "IF (SELECT * WHERE test1 = ?) "
  . "SELECT * "
  . "ELSE SELECT * WHERE test2 = ?"
  );

  expect($stmt->bindings())
  ->toBe(['test1', 'test2']);

});