<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set logged', function ()
{

  expect(
    (string) SQL::alter()
    ->setLogged()
  )
  ->toEqual("ALTER TABLE SET LOGGED");

});

it('can set unlogged', function ()
{

  expect(
    (string) SQL::alter()
    ->setUnlogged()
  )
  ->toEqual("ALTER TABLE SET UNLOGGED");

});