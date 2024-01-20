<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can convert partition', function ()
{

  expect(
    (string) SQL::alter()
    ->convertPartition('p0', 'test')
  )
  ->toEqual("ALTER TABLE CONVERT PARTITION p0 TO TABLE test");

});

it('can drop partition', function ()
{

  expect(
    (string) SQL::alter()
    ->dropPartition('p0')
  )
  ->toEqual("ALTER TABLE DROP PARTITION p0");

});

it('can drop multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->dropPartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE DROP PARTITION p0, p1");

});

it('can drop partition if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropPartitionIfExists('p0')
  )
  ->toEqual("ALTER TABLE DROP PARTITION IF EXISTS p0");

});

it('can drop multiple partitions if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropPartitionIfExists(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE DROP PARTITION IF EXISTS p0, p1");

});

it('can discard partition', function ()
{

  expect(
    (string) SQL::alter()
    ->discardPartition('p0')
  )
  ->toEqual("ALTER TABLE DISCARD PARTITION p0 TABLESPACE");

});

it('can discard multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->discardPartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE DISCARD PARTITION p0, p1 TABLESPACE");

});

it('can discard partition all', function ()
{

  expect(
    (string) SQL::alter()
    ->discardPartition()
  )
  ->toEqual("ALTER TABLE DISCARD PARTITION ALL TABLESPACE");

});

it('can import partition', function ()
{

  expect(
    (string) SQL::alter()
    ->importPartition('p0')
  )
  ->toEqual("ALTER TABLE IMPORT PARTITION p0 TABLESPACE");

});

it('can import multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->importPartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE IMPORT PARTITION p0, p1 TABLESPACE");

});

it('can import partition all', function ()
{

  expect(
    (string) SQL::alter()
    ->importPartition()
  )
  ->toEqual("ALTER TABLE IMPORT PARTITION ALL TABLESPACE");

});

it('can truncate partition', function ()
{

  expect(
    (string) SQL::alter()
    ->truncatePartition('p0')
  )
  ->toEqual("ALTER TABLE TRUNCATE PARTITION p0");

});

it('can truncate multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->truncatePartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE TRUNCATE PARTITION p0, p1");

});

it('can coalesce partition', function ()
{

  expect(
    (string) SQL::alter()
    ->coalescePartition(1)
  )
  ->toEqual("ALTER TABLE COALESCE PARTITION 1");

});

it('can analyze partition', function ()
{

  expect(
    (string) SQL::alter()
    ->analyzePartition('p0')
  )
  ->toEqual("ALTER TABLE ANALYZE PARTITION p0");

});

it('can analyze multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->analyzePartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE ANALYZE PARTITION p0, p1");

});

it('can check partition', function ()
{

  expect(
    (string) SQL::alter()
    ->checkPartition('p0')
  )
  ->toEqual("ALTER TABLE CHECK PARTITION p0");

});

it('can check multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->checkPartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE CHECK PARTITION p0, p1");

});

it('can optimize partition', function ()
{

  expect(
    (string) SQL::alter()
    ->optimizePartition('p0')
  )
  ->toEqual("ALTER TABLE OPTIMIZE PARTITION p0");

});

it('can optimize multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->optimizePartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE OPTIMIZE PARTITION p0, p1");

});

it('can rebuild partition', function ()
{

  expect(
    (string) SQL::alter()
    ->rebuildPartition('p0')
  )
  ->toEqual("ALTER TABLE REBUILD PARTITION p0");

});

it('can rebuild multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->rebuildPartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE REBUILD PARTITION p0, p1");

});

it('can repair partition', function ()
{

  expect(
    (string) SQL::alter()
    ->repairPartition('p0')
  )
  ->toEqual("ALTER TABLE REPAIR PARTITION p0");

});

it('can repair multiple partitions', function ()
{

  expect(
    (string) SQL::alter()
    ->repairPartition(['p0', 'p1'])
  )
  ->toEqual("ALTER TABLE REPAIR PARTITION p0, p1");

});

it('can exchange partition', function ()
{

  expect(
    (string) SQL::alter()
    ->exchangePartition('p0', 'test')
  )
  ->toEqual("ALTER TABLE EXCHANGE PARTITION p0 WITH TABLE test");

});

it('can exchange partition without validation', function ()
{

  expect(
    (string) SQL::alter()
    ->exchangePartitionWithoutValidation('p0', 'test')
  )
  ->toEqual("ALTER TABLE EXCHANGE PARTITION p0 WITH TABLE test WITHOUT VALIDATION");

});

it('can remove partitioning', function ()
{

  expect(
    (string) SQL::alter()
    ->removePartitioning()
  )
  ->toEqual("ALTER TABLE REMOVE PARTITIONING");

});