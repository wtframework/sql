<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set checksum', function ()
{

  expect(
    (string) SQL::create()
    ->checksum()
  )
  ->toEqual("CREATE TABLE CHECKSUM 1");

});

it('can set checksum off', function ()
{

  expect(
    (string) SQL::create()
    ->checksum(false)
  )
  ->toEqual("CREATE TABLE CHECKSUM 0");

});