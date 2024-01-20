<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can use partition', function ()
{

  expect(
    (string) SQL::table('t1')
    ->partition('p0')
  )
  ->toEqual('t1 PARTITION (p0)');

});

it('can use multiple partitions', function ()
{

  expect(
    (string) SQL::table('t1')
    ->partition(['p0', 'p1'])
  )
  ->toEqual('t1 PARTITION (p0, p1)');

});