<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can enable row level security', function ()
{

  expect(
    (string) SQL::alter()
    ->enableRowLevelSecurity()
  )
  ->toEqual("ALTER TABLE ENABLE ROW LEVEL SECURITY");

});

it('can disable row level security', function ()
{

  expect(
    (string) SQL::alter()
    ->disableRowLevelSecurity()
  )
  ->toEqual("ALTER TABLE DISABLE ROW LEVEL SECURITY");

});

it('can force row level security', function ()
{

  expect(
    (string) SQL::alter()
    ->forceRowLevelSecurity()
  )
  ->toEqual("ALTER TABLE FORCE ROW LEVEL SECURITY");

});

it('can no force row level security', function ()
{

  expect(
    (string) SQL::alter()
    ->noForceRowLevelSecurity()
  )
  ->toEqual("ALTER TABLE NO FORCE ROW LEVEL SECURITY");

});