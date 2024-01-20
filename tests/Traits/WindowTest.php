<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select window', function ()
{

  expect(
    (string) SQL::select()
    ->window('test1', 'test2')
  )
  ->toEqual("SELECT * WINDOW test1 AS (test2)");

});

it('can select multiple windows', function ()
{

  expect(
    (string) SQL::select()
    ->window([
      'test1' => 'test2',
      'test3' => 'test4',
    ])
  )
  ->toEqual("SELECT * WINDOW test1 AS (test2), test3 AS (test4)");

});

it('can select bound window', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->window('test1', SQL::bind('test2'))
  )
  ->toEqual("SELECT * WINDOW test1 AS (?)");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});