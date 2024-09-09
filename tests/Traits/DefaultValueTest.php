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