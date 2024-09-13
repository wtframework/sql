<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set stats sample pages', function ()
{

  expect(
    (string) SQL::create()
    ->statsSamplePages(1)
  )
  ->toEqual("CREATE TABLE STATS_SAMPLE_PAGES = 1");

});

it('can set stats sample pages default', function ()
{

  expect(
    (string) SQL::create()
    ->statsSamplePagesDefault()
  )
  ->toEqual("CREATE TABLE STATS_SAMPLE_PAGES = DEFAULT");

});