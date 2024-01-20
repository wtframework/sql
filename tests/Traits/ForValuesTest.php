<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set for values default', function ()
{

  expect(
    (string) SQL::create()
    ->forValuesDefault()
  )
  ->toEqual("CREATE TABLE FOR VALUES DEFAULT");

});

it('can set for values in', function ()
{

  expect(
    (string) SQL::create()
    ->forValuesIn([1, 2])
  )
  ->toEqual("CREATE TABLE FOR VALUES IN (1, 2)");

});

it('can set for values with', function ()
{

  expect(
    (string) SQL::create()
    ->forValuesWith(1, 2)
  )
  ->toEqual("CREATE TABLE FOR VALUES WITH (MODULUS 1, REMAINDER 2)");

});

it('can set for values from to', function ()
{

  expect(
    (string) SQL::create()
    ->forValues(1, 2)
  )
  ->toEqual("CREATE TABLE FOR VALUES FROM (1) TO (2)");

});

it('can set for values from to multiple', function ()
{

  expect(
    (string) SQL::create()
    ->forValues([1, 2], ['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE FOR VALUES FROM (1, 2) TO (test1, test2)");

});

it('can set for values bound parameters', function ()
{

  expect(
    (string) $stmt = SQL::create()
    ->forValuesIn([SQL::bind('test1'), SQL::bind('test2')])
  )
  ->toEqual("CREATE TABLE FOR VALUES IN (?, ?)");

  expect($stmt->bindings())
  ->toBe(['test1', 'test2']);

});