<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can update returning all', function ()
{

  expect(
    (string) SQL::update()
    ->returning()
  )
  ->toEqual("UPDATE RETURNING *");

});

it('can update returning column', function ()
{

  expect(
    (string) SQL::update()
    ->returning('test')
  )
  ->toEqual("UPDATE RETURNING test");

});

it('can update returning multiple columns', function ()
{

  expect(
    (string) SQL::update()
    ->returning(['test1', 'test2'])
  )
  ->toEqual("UPDATE RETURNING test1, test2");

});

it('can update returning column with alias', function ()
{

  expect(
    (string) SQL::update()
    ->returning(['test1' => 'test2'])
  )
  ->toEqual("UPDATE RETURNING test2 AS test1");

});

it('can update returning bound value', function ()
{

  expect(
    (string) $stmt = SQL::update()
    ->returning(SQL::bind('test'))
  )
  ->toEqual("UPDATE RETURNING ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});