<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can override system value', function ()
{

  expect(
    (string) SQL::insert()
    ->overridingSystemValue()
  )
  ->toEqual('INSERT OVERRIDING SYSTEM VALUE VALUES ()');

});

it('can override user value', function ()
{

  expect(
    (string) SQL::insert()
    ->overridingUserValue()
  )
  ->toEqual('INSERT OVERRIDING USER VALUE VALUES ()');

});