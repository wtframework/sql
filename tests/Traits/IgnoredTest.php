<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set ignored', function ()
{

  expect(
    (string) SQL::index()
    ->ignored()
  )
  ->toEqual("INDEX IGNORED");

});

it('can set not ignored', function ()
{

  expect(
    (string) SQL::index()
    ->notIgnored()
  )
  ->toEqual("INDEX NOT IGNORED");

});