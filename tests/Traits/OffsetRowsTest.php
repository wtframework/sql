<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can offset rows', function ()
{

  expect(
    (string) SQL::select()
    ->offsetRows(10)
  )
  ->toEqual("SELECT * OFFSET 10 ROWS");

});

it('can offset bound value rows', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->offsetRows(SQL::bind(1))
  )
  ->toEqual("SELECT * OFFSET ? ROWS");

  expect($stmt->bindings())
  ->toEqual([1]);

});