<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set delay key write', function ()
{

  expect(
    (string) SQL::create()
    ->delayKeyWrite()
  )
  ->toEqual("CREATE TABLE DELAY_KEY_WRITE = 1");

});

it('can set delay key write off', function ()
{

  expect(
    (string) SQL::create()
    ->delayKeyWrite(false)
  )
  ->toEqual("CREATE TABLE DELAY_KEY_WRITE = 0");

});