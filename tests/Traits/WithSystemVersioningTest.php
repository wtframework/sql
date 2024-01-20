<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set with system versioning', function ()
{

  expect(
    (string) SQL::column('test')
    ->withSystemVersioning()
  )
  ->toEqual("test WITH SYSTEM VERSIONING");

});

it('can set without system versioning', function ()
{

  expect(
    (string) SQL::column('test')
    ->withoutSystemVersioning()
  )
  ->toEqual("test WITHOUT SYSTEM VERSIONING");

});