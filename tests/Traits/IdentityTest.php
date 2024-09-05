<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set column as identity', function ()
{

  expect(
    (string) SQL::column('test')
    ->identity()
  )
  ->toEqual("test IDENTITY (1, 1)");

});

it('can set column as identity with seed and increment', function ()
{

  expect(
    (string) SQL::column('test')
    ->identity(2, 3)
  )
  ->toEqual("test IDENTITY (2, 3)");

});