<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set default', function ()
{

  expect(
    (string) $column = SQL::column('test')
    ->default('test')
  )
  ->toEqual("test DEFAULT (?)");

  expect($column->bindings())
  ->toEqual(['test']);

});

it('can set default integer', function ()
{

  expect(
    (string) SQL::column('test')
    ->default(1)
  )
  ->toEqual("test DEFAULT (1)");

});

it('can set default raw value', function ()
{

  expect(
    (string) SQL::column('test')
    ->default(SQL::raw('test'))
  )
  ->toEqual("test DEFAULT (test)");

});