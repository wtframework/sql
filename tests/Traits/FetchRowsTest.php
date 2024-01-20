<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can fetch rows', function ()
{

  expect(
    (string) SQL::select()
    ->fetchRows(10)
  )
  ->toEqual("SELECT * FETCH NEXT 10 ROWS ONLY");

});

it('can fetch rows with ties', function ()
{

  expect(
    (string) SQL::select()
    ->fetchRowsWithTies(10)
  )
  ->toEqual("SELECT * FETCH NEXT 10 ROWS WITH TIES");

});

it('can fetch bound value rows', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->fetchRows(SQL::bind('test'))
  )
  ->toEqual("SELECT * FETCH NEXT ? ROWS ONLY");

  expect($stmt->bindings())
  ->toEqual(['test']);

});