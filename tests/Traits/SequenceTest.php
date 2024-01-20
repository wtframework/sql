<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set sequence', function ()
{

  expect(
    (string) SQL::create()
    ->sequence()
  )
  ->toEqual("CREATE TABLE SEQUENCE 1");

});

it('can set sequence off', function ()
{

  expect(
    (string) SQL::create()
    ->sequence(false)
  )
  ->toEqual("CREATE TABLE SEQUENCE 0");

});