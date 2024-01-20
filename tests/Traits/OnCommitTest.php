<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set on commit delete rows', function ()
{

  expect(
    (string) SQL::create()
    ->onCommitDeleteRows()
  )
  ->toEqual("CREATE TABLE ON COMMIT DELETE ROWS");

});

it('can set on commit drop', function ()
{

  expect(
    (string) SQL::create()
    ->onCommitDrop()
  )
  ->toEqual("CREATE TABLE ON COMMIT DROP");

});