<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can create as select', function ()
{

  expect(
    (string) SQL::create()
    ->as('test')
  )
  ->toEqual("CREATE TABLE AS test");

});

it('can create as select bound value', function ()
{

  expect(
    (string) $stmt = SQL::create()
    ->as(SQL::bind('test'))
  )
  ->toEqual("CREATE TABLE AS ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});