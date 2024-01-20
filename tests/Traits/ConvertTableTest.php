<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can convert table', function ()
{

  expect(
    (string) SQL::alter()
    ->convertTable('test', 'p0')
  )
  ->toEqual("ALTER TABLE CONVERT TABLE test TO p0");

});

it('can convert table with bound parameters', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->convertTable(
      'test',
      SQL::partition('p0')
      ->valuesLessThan(SQL::bind('test'))
    )
  )
  ->toEqual("ALTER TABLE CONVERT TABLE test TO PARTITION p0 VALUES LESS THAN (?)");

  expect($stmt->bindings())
  ->toBe(['test']);

});