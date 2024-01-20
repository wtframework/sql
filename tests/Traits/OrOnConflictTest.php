<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can insert or fail', function ()
{

  expect(
    (string) SQL::insert()
    ->orFail()
  )
  ->toEqual("INSERT OR FAIL VALUES ()");

});

it('can insert or ignore', function ()
{

  expect(
    (string) SQL::insert()
    ->orIgnore()
  )
  ->toEqual("INSERT OR IGNORE VALUES ()");

});

it('can insert or roll back', function ()
{

  expect(
    (string) SQL::insert()
    ->orRollBack()
  )
  ->toEqual("INSERT OR ROLLBACK VALUES ()");

});