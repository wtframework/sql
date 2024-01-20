<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set transactional', function ()
{

  expect(
    (string) SQL::create()
    ->transactional()
  )
  ->toEqual("CREATE TABLE TRANSACTIONAL 1");

});

it('can set transactional off', function ()
{

  expect(
    (string) SQL::create()
    ->transactional(false)
  )
  ->toEqual("CREATE TABLE TRANSACTIONAL 0");

});