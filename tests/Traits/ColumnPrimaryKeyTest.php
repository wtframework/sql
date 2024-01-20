<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set as primary key', function ()
{

  expect(
    (string) SQL::constraint()
    ->primaryKey()
  )
  ->toEqual("PRIMARY KEY");

});

it('can set as primary key desc', function ()
{

  expect(
    (string) SQL::constraint()
    ->primaryKeyDesc()
  )
  ->toEqual("PRIMARY KEY DESC");

});