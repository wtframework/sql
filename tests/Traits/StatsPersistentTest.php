<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set stats persistent', function ()
{

  expect(
    (string) SQL::create()
    ->statsPersistent()
  )
  ->toEqual("CREATE TABLE STATS_PERSISTENT 1");

});

it('can set stats persistent off', function ()
{

  expect(
    (string) SQL::create()
    ->statsPersistent(false)
  )
  ->toEqual("CREATE TABLE STATS_PERSISTENT 0");

});

it('can set stats persistent default', function ()
{

  expect(
    (string) SQL::create()
    ->statsPersistentDefault()
  )
  ->toEqual("CREATE TABLE STATS_PERSISTENT DEFAULT");

});