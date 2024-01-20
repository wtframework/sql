<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set with system versioning', function ()
{

  expect(
    (string) SQL::alter()
    ->withValidation()
  )
  ->toEqual("ALTER TABLE WITH VALIDATION");

});

it('can set without system versioning', function ()
{

  expect(
    (string) SQL::alter()
    ->withoutValidation()
  )
  ->toEqual("ALTER TABLE WITHOUT VALIDATION");

});