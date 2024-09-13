<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set encrypted', function ()
{

  expect(
    (string) SQL::create()
    ->encrypted()
  )
  ->toEqual("CREATE TABLE ENCRYPTED = YES");

});

it('can set encrypted off', function ()
{

  expect(
    (string) SQL::create()
    ->encrypted(false)
  )
  ->toEqual("CREATE TABLE ENCRYPTED = NO");

});