<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can offset', function ()
{

  expect(
    (string) SQL::select()
    ->offset(10)
  )
  ->toEqual("SELECT * OFFSET 10");

});

it('can offset bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->offset(SQL::bind(1))
  )
  ->toEqual("SELECT * OFFSET ?");

  expect($stmt->bindings())
  ->toEqual([1]);

});