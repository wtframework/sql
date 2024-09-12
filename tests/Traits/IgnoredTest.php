<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set ignored', function ()
{

  expect(
    (string) SQL::index('test')
    ->ignored()
  )
  ->toEqual("INDEX (test) IGNORED");

});

it('can set not ignored', function ()
{

  expect(
    (string) SQL::index('test')
    ->notIgnored()
  )
  ->toEqual("INDEX (test) NOT IGNORED");

});