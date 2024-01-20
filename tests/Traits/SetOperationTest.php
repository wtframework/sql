<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can union statement', function ()
{

  expect(
    (string) SQL::select()
    ->union('SELECT')
  )
  ->toEqual("SELECT * UNION SELECT");

});

it('can union multiple statements', function ()
{

  expect(
    (string) SQL::select()
    ->union([
      'SELECT 1',
      'SELECT 2',
    ])
  )
  ->toEqual("SELECT * UNION SELECT 1 UNION SELECT 2");

});

it('can union all statement', function ()
{

  expect(
    (string) SQL::select()
    ->unionAll('SELECT')
  )
  ->toEqual("SELECT * UNION ALL SELECT");

});

it('can union all multiple statements', function ()
{

  expect(
    (string) SQL::select()
    ->unionAll([
      'SELECT 1',
      'SELECT 2',
    ])
  )
  ->toEqual("SELECT * UNION ALL SELECT 1 UNION ALL SELECT 2");

});

it('can union bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->union(SQL::bind('test'))
  )
  ->toEqual("SELECT * UNION ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});

it('can intersect statement', function ()
{

  expect(
    (string) SQL::select()
    ->intersect('SELECT')
  )
  ->toEqual("SELECT * INTERSECT SELECT");

});

it('can intersect multiple statements', function ()
{

  expect(
    (string) SQL::select()
    ->intersect([
      'SELECT 1',
      'SELECT 2',
    ])
  )
  ->toEqual("SELECT * INTERSECT SELECT 1 INTERSECT SELECT 2");

});

it('can intersect all statement', function ()
{

  expect(
    (string) SQL::select()
    ->intersectAll('SELECT')
  )
  ->toEqual("SELECT * INTERSECT ALL SELECT");

});

it('can intersect all multiple statements', function ()
{

  expect(
    (string) SQL::select()
    ->intersectAll([
      'SELECT 1',
      'SELECT 2',
    ])
  )
  ->toEqual("SELECT * INTERSECT ALL SELECT 1 INTERSECT ALL SELECT 2");

});

it('can intersect bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->intersect(SQL::bind('test'))
  )
  ->toEqual("SELECT * INTERSECT ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});

it('can except statement', function ()
{

  expect(
    (string) SQL::select()
    ->except('SELECT')
  )
  ->toEqual("SELECT * EXCEPT SELECT");

});

it('can except multiple statements', function ()
{

  expect(
    (string) SQL::select()
    ->except([
      'SELECT 1',
      'SELECT 2',
    ])
  )
  ->toEqual("SELECT * EXCEPT SELECT 1 EXCEPT SELECT 2");

});

it('can except all statement', function ()
{

  expect(
    (string) SQL::select()
    ->exceptAll('SELECT')
  )
  ->toEqual("SELECT * EXCEPT ALL SELECT");

});

it('can except all multiple statements', function ()
{

  expect(
    (string) SQL::select()
    ->exceptAll([
      'SELECT 1',
      'SELECT 2',
    ])
  )
  ->toEqual("SELECT * EXCEPT ALL SELECT 1 EXCEPT ALL SELECT 2");

});

it('can except bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->except(SQL::bind('test'))
  )
  ->toEqual("SELECT * EXCEPT ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});