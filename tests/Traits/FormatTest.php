<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set column format default', function ()
{

  expect(
    (string) SQL::column('test')
    ->formatDefault()
  )
  ->toEqual("test COLUMN_FORMAT DEFAULT");

});

it('can set column format dynamic', function ()
{

  expect(
    (string) SQL::column('test')
    ->formatDynamic()
  )
  ->toEqual("test COLUMN_FORMAT DYNAMIC");

});

it('can set column format fixed', function ()
{

  expect(
    (string) SQL::column('test')
    ->formatFixed()
  )
  ->toEqual("test COLUMN_FORMAT FIXED");

});