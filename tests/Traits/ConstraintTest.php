<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can create constraint', function ()
{

  expect(
    (string) SQL::create()
    ->constraint('test')
  )
  ->toEqual("CREATE TABLE (test)");

});

it('can create multiple constraints', function ()
{

  expect(
    (string) SQL::create()
    ->constraint(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE (test1, test2)");

});

it('can create bound value constraint', function ()
{

  expect(
    (string) $stmt = SQL::create()
    ->constraint(SQL::bind('test'))
  )
  ->toEqual("CREATE TABLE (?)");

  expect($stmt->bindings())
  ->toEqual(['test']);

});