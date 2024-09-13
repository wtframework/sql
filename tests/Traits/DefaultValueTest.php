<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set default', function ()
{

  expect(
    (string) SQL::column('test')
    ->default('test')
  )
  ->toEqual("test DEFAULT ('test')");

});

it('can set default with escaped quote', function ()
{

  expect(
    (string) SQL::column('test')
    ->default("'test'")
  )
  ->toEqual("test DEFAULT ('''test''')");

});

it('can set default integer', function ()
{

  expect(
    (string) SQL::column('test')
    ->default(1)
  )
  ->toEqual("test DEFAULT (1)");

});

it('can set default null', function ()
{

  expect(
    (string) SQL::column('test')
    ->default(null)
  )
  ->toEqual("test DEFAULT (NULL)");

});

it('can set default raw', function ()
{

  expect(
    (string) SQL::column('test')
    ->default(SQL::raw("CURRENT_TIMESTAMP"))
  )
  ->toEqual("test DEFAULT (CURRENT_TIMESTAMP)");

});