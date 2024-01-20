<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can on update set null', function ()
{

  expect(
    (string) SQL::constraint()
    ->onUpdateSetNull()
  )
  ->toEqual("ON UPDATE SET NULL");

});

it('can on update set default', function ()
{

  expect(
    (string) SQL::constraint()
    ->onUpdateSetDefault()
  )
  ->toEqual("ON UPDATE SET DEFAULT");

});

it('can on update cascade', function ()
{

  expect(
    (string) SQL::constraint()
    ->onUpdateCascade()
  )
  ->toEqual("ON UPDATE CASCADE");

});

it('can on update restrict', function ()
{

  expect(
    (string) SQL::constraint()
    ->onUpdateRestrict()
  )
  ->toEqual("ON UPDATE RESTRICT");

});