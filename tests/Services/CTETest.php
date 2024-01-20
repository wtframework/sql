<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get cte', function ()
{

  expect(
    (string) SQL::cte('cte', 'SELECT')
    ->column('c1')
    ->materialized()
    ->cycleRestrict('c1')
    ->searchBreadth('c1', 'c2')
    ->cycle('c1')
  )
  ->toBe(
    "cte "
  . "(c1) "
  . "AS MATERIALIZED "
  . "(SELECT) "
  . "CYCLE c1 RESTRICT "
  . "SEARCH BREADTH FIRST BY c1 SET c2 "
  . "CYCLE c1"
  );

});