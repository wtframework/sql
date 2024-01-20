<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can enable keys', function ()
{

  expect(
    (string) SQL::alter()
    ->enableKeys()
  )
  ->toEqual("ALTER TABLE ENABLE KEYS");

});

it('can disable keys', function ()
{

  expect(
    (string) SQL::alter()
    ->disableKeys()
  )
  ->toEqual("ALTER TABLE DISABLE KEYS");

});