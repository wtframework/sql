<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can update table', function ()
{

  expect(
    (string) SQL::update()
    ->table('test')
  )
  ->toEqual("UPDATE test");

});

it('can update multiple tables', function ()
{

  expect(
    (string) SQL::update()
    ->table(['test1', 'test2'])
  )
  ->toEqual("UPDATE test1, test2");

});

it('can update table with alias', function ()
{

  expect(
    (string) SQL::update()
    ->table(['test1' => 'test2'])
  )
  ->toEqual("UPDATE test2 AS test1");

});