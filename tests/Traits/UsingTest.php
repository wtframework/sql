<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can delete using table', function ()
{

  expect(
    (string) SQL::delete()
    ->using('test')
  )
  ->toEqual("DELETE USING test");

});

it('can delete using multiple tables', function ()
{

  expect(
    (string) SQL::delete()
    ->using(['test1', 'test2'])
  )
  ->toEqual("DELETE USING test1, test2");

});

it('can delete using table with alias', function ()
{

  expect(
    (string) SQL::delete()
    ->using(['test1' => 'test2'])
  )
  ->toEqual("DELETE USING test2 AS test1");

});

it('can delete using bound value', function ()
{

  expect(
    (string) $stmt = SQL::delete()
    ->using(SQL::bind('test'))
  )
  ->toEqual("DELETE USING ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});