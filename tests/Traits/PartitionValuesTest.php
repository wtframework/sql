<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set values less than max value', function ()
{

  expect(
    (string) SQL::partition('test')
    ->valuesLessThanMaxValue()
  )
  ->toEqual("PARTITION test VALUES LESS THAN MAXVALUE");

});

it('can set values less than expression', function ()
{

  expect(
    (string) SQL::partition('test')
    ->valuesLessThan('test')
  )
  ->toEqual("PARTITION test VALUES LESS THAN (test)");

});

it('can set values less than', function ()
{

  expect(
    (string) SQL::partition('test')
    ->valuesLessThan([1, 2])
  )
  ->toEqual("PARTITION test VALUES LESS THAN (1, 2)");

});

it('can set values in', function ()
{

  expect(
    (string) SQL::partition('test')
    ->valuesIn([1, 2])
  )
  ->toEqual("PARTITION test VALUES IN (1, 2)");

});

it('can set values using bound parameters', function ()
{

  expect(
    (string) $partition = SQL::partition('test')
    ->valuesLessThan(SQL::raw('YEAR(?)')->bind('test'))
  )
  ->toEqual("PARTITION test VALUES LESS THAN (YEAR(?))");

  expect($partition->bindings())
  ->toBe(['test']);

});