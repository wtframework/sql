<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add partition', function ()
{

  expect(
    (string) SQL::alter()
    ->addPartition('p0')
  )
  ->toEqual("ALTER TABLE ADD PARTITION (p0)");

});

it('can add partition if not exists', function ()
{

  expect(
    (string) SQL::alter()
    ->addPartitionIfNotExists('p0')
  )
  ->toEqual("ALTER TABLE ADD PARTITION IF NOT EXISTS (p0)");

});

it('can add partition with bound parameters', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->addPartition(
      SQL::partition('p0')
      ->valuesLessThan(SQL::bind('test'))
    )
  )
  ->toEqual("ALTER TABLE ADD PARTITION (PARTITION p0 VALUES LESS THAN (?))");

  expect($stmt->bindings())
  ->toBe(['test']);

});