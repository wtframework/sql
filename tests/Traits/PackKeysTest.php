<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set pack keys', function ()
{

  expect(
    (string) SQL::create()
    ->packKeys()
  )
  ->toEqual("CREATE TABLE PACK_KEYS = 1");

});

it('can set pack keys off', function ()
{

  expect(
    (string) SQL::create()
    ->packKeys(false)
  )
  ->toEqual("CREATE TABLE PACK_KEYS = 0");

});

it('can set pack keys default', function ()
{

  expect(
    (string) SQL::create()
    ->packKeysDefault()
  )
  ->toEqual("CREATE TABLE PACK_KEYS = DEFAULT");

});