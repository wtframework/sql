<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can limit', function ()
{

  expect(
    (string) SQL::select()
    ->limit(10)
  )
  ->toEqual("SELECT * LIMIT 10");

});

it('can limit bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->limit(SQL::bind(1))
  )
  ->toEqual("SELECT * LIMIT ?");

  expect($stmt->bindings())
  ->toEqual([1]);

});