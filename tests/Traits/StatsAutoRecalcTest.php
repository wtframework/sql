<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set stats auto recalc', function ()
{

  expect(
    (string) SQL::create()
    ->statsAutoRecalc()
  )
  ->toEqual("CREATE TABLE STATS_AUTO_RECALC 1");

});

it('can set stats auto recalc off', function ()
{

  expect(
    (string) SQL::create()
    ->statsAutoRecalc(false)
  )
  ->toEqual("CREATE TABLE STATS_AUTO_RECALC 0");

});

it('can set stats auto recalc default', function ()
{

  expect(
    (string) SQL::create()
    ->statsAutoRecalcDefault()
  )
  ->toEqual("CREATE TABLE STATS_AUTO_RECALC DEFAULT");

});