<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set ietf quotes', function ()
{

  expect(
    (string) SQL::create()
    ->ietfQuotes()
  )
  ->toEqual("CREATE TABLE IETF_QUOTES YES");

});

it('can set ietf quotes off', function ()
{

  expect(
    (string) SQL::create()
    ->ietfQuotes(false)
  )
  ->toEqual("CREATE TABLE IETF_QUOTES NO");

});