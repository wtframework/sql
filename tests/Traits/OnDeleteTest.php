<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can on delete set null', function ()
{

  expect(
    (string) SQL::constraint()
    ->onDeleteSetNull()
  )
  ->toEqual("ON DELETE SET NULL");

});

it('can on delete set default', function ()
{

  expect(
    (string) SQL::constraint()
    ->onDeleteSetDefault()
  )
  ->toEqual("ON DELETE SET DEFAULT");

});

it('can on delete cascade', function ()
{

  expect(
    (string) SQL::constraint()
    ->onDeleteCascade()
  )
  ->toEqual("ON DELETE CASCADE");

});

it('can on delete restrict', function ()
{

  expect(
    (string) SQL::constraint()
    ->onDeleteRestrict()
  )
  ->toEqual("ON DELETE RESTRICT");

});