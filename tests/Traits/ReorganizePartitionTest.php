<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can reorganize partition', function ()
{

  expect(
    (string) SQL::alter()
    ->reorganizePartition()
  )
  ->toEqual("ALTER TABLE REORGANIZE PARTITION");

});

it('can reorganize partition into', function ()
{

  expect(
    (string) SQL::alter()
    ->reorganizePartition(
      'p0',
      'p1'
    )
  )
  ->toEqual("ALTER TABLE REORGANIZE PARTITION p0 INTO (p1)");

});

it('can reorganize multiple partitions into', function ()
{

  expect(
    (string) SQL::alter()
    ->reorganizePartition(
      ['p0', 'p1'],
      ['p2', 'p3'],
    )
  )
  ->toEqual("ALTER TABLE REORGANIZE PARTITION p0, p1 INTO (p2, p3)");

});

it('can reorganize partition with bound parameters', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->reorganizePartition(
      'p0',
      SQL::partition('p0')
      ->valuesLessThan(SQL::bind('test'))
    )
  )
  ->toEqual("ALTER TABLE REORGANIZE PARTITION p0 INTO (PARTITION p0 VALUES LESS THAN (?))");

  expect($stmt->bindings())
  ->toBe(['test']);

});