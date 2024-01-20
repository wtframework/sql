<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set rows examined', function ()
{

  expect(
    (string) SQL::select()
    ->rowsExamined(10)
  )
  ->toEqual("SELECT * ROWS EXAMINED 10");

});

it('can set rows examined bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->rowsExamined(SQL::bind(1))
  )
  ->toEqual("SELECT * ROWS EXAMINED ?");

  expect($stmt->bindings())
  ->toEqual([1]);

});