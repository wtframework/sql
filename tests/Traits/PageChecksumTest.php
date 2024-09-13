<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set page checksum', function ()
{

  expect(
    (string) SQL::create()
    ->pageChecksum()
  )
  ->toEqual("CREATE TABLE PAGE_CHECKSUM = 1");

});

it('can set page checksum off', function ()
{

  expect(
    (string) SQL::create()
    ->pageChecksum(false)
  )
  ->toEqual("CREATE TABLE PAGE_CHECKSUM = 0");

});