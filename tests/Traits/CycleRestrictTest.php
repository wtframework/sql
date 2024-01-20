<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can cycle restrict column', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->cycleRestrict('test3')
  )
  ->toEqual('test1 AS (test2) CYCLE test3 RESTRICT');

});

it('can cycle restrict multiple columns', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->cycleRestrict(['test3', 'test4'])
  )
  ->toEqual('test1 AS (test2) CYCLE test3, test4 RESTRICT');

});