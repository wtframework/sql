<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get materialized cte', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->materialized()
  )
  ->toEqual('test1 AS MATERIALIZED (test2)');

});

it('can get not materialized cte', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->notMaterialized()
  )
  ->toEqual('test1 AS NOT MATERIALIZED (test2)');

});