<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can detach partition', function ()
{

  expect(
    (string) SQL::alter()
    ->detachPartition('p0')
  )
  ->toEqual("ALTER TABLE DETACH PARTITION p0");

});

it('can detach partition concurrently', function ()
{

  expect(
    (string) SQL::alter()
    ->detachPartitionConcurrently('p0')
  )
  ->toEqual("ALTER TABLE DETACH PARTITION p0 CONCURRENTLY");

});

it('can detach partition finalize', function ()
{

  expect(
    (string) SQL::alter()
    ->detachPartitionFinalize('p0')
  )
  ->toEqual("ALTER TABLE DETACH PARTITION p0 FINALIZE");

});