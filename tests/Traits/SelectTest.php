<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can insert select', function ()
{

  expect(
    (string) SQL::insert()
    ->select('test')
  )
  ->toEqual("INSERT test");

});

it('can insert select bound value', function ()
{

  expect(
    (string) $stmt = SQL::insert()
    ->select(SQL::bind('test'))
  )
  ->toEqual("INSERT ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});