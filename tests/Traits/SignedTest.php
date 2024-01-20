<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set as signed', function ()
{

  expect(
    (string) SQL::column('test')
    ->signed()
  )
  ->toEqual("test SIGNED");

});

it('can set as unsigned', function ()
{

  expect(
    (string) SQL::column('test')
    ->unsigned()
  )
  ->toEqual("test UNSIGNED");

});