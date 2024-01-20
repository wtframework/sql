<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can insert on conflict upsert', function ()
{

  expect(
    (string) SQL::insert()
    ->onConflict('test')
  )
  ->toEqual("INSERT VALUES () ON CONFLICT test");

});

it('can insert multiple on conflict upserts', function ()
{

  expect(
    (string) SQL::insert()
    ->onConflict(['test1', 'test2'])
  )
  ->toEqual("INSERT VALUES () ON CONFLICT test1 ON CONFLICT test2");

});

it('can insert on conflict upsert bound value', function ()
{

  expect(
    (string) $stmt = SQL::insert()
    ->onConflict(SQL::bind('test'))
  )
  ->toEqual("INSERT VALUES () ON CONFLICT ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});