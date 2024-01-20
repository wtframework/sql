<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can create column', function ()
{

  expect(
    (string) SQL::create()
    ->column('test')
  )
  ->toEqual("CREATE TABLE (test)");

});

it('can create multiple columns', function ()
{

  expect(
    (string) SQL::create()
    ->column(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE (test1, test2)");

});

it('can create bound value column', function ()
{

  expect(
    (string) $stmt = SQL::create()
    ->column(SQL::bind('test'))
  )
  ->toEqual("CREATE TABLE (?)");

  expect($stmt->bindings())
  ->toEqual(['test']);

});