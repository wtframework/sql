<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set encryption', function ()
{

  expect(
    (string) SQL::create()
    ->encryption()
  )
  ->toEqual("CREATE TABLE ENCRYPTION 'Y'");

});

it('can set encryption off', function ()
{

  expect(
    (string) SQL::create()
    ->encryption(false)
  )
  ->toEqual("CREATE TABLE ENCRYPTION 'N'");

});