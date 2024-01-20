<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set page compressed', function ()
{

  expect(
    (string) SQL::create()
    ->pageCompressed()
  )
  ->toEqual("CREATE TABLE PAGE_COMPRESSED 1");

});

it('can set page compressed off', function ()
{

  expect(
    (string) SQL::create()
    ->pageCompressed(false)
  )
  ->toEqual("CREATE TABLE PAGE_COMPRESSED 0");

});