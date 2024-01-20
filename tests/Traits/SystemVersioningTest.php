<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add system versioning', function ()
{

  expect(
    (string) SQL::alter()
    ->addSystemVersioning()
  )
  ->toEqual("ALTER TABLE ADD SYSTEM VERSIONING");

});

it('can drop system versioning', function ()
{

  expect(
    (string) SQL::alter()
    ->dropSystemVersioning()
  )
  ->toEqual("ALTER TABLE DROP SYSTEM VERSIONING");

});