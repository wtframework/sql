<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set', function ()
{

  expect(
    (string) SQL::update()
    ->set('test', 1)
  )
  ->toEqual("UPDATE SET test = 1");

});

it('can set multiple values', function ()
{

  expect(
    (string) SQL::update()
    ->set([
      'test1' => 1,
      'test2' => 2,
    ])
  )
  ->toEqual("UPDATE SET test1 = 1, test2 = 2");

});

it('can set bound value', function ()
{

  expect(
    (string) $stmt = SQL::update()
    ->set('test1', 'test2')
  )
  ->toEqual("UPDATE SET test1 = ?");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});

it('can set multiple columns', function ()
{

  expect(
    (string) SQL::update()
    ->set(['test1', 'test2'], 1)
  )
  ->toEqual("UPDATE SET (test1, test2) = 1");

});

it('can set null', function ()
{

  expect(
    (string) SQL::update()
    ->set('test1', null)
  )
  ->toEqual("UPDATE SET test1 = NULL");

});