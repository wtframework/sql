<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can check', function ()
{

  expect(
    (string) SQL::create()
    ->check('test')
  )
  ->toEqual("CREATE TABLE (CHECK (test))");

});

it('can check multiple', function ()
{

  expect(
    (string) SQL::create()
    ->check(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE (CHECK (test1), CHECK (test2))");

});

it('can check bound value', function ()
{

  expect(
    (string) $create = SQL::create()
    ->check(SQL::bind('test'))
  )
  ->toEqual("CREATE TABLE (CHECK (?))");

  expect($create->bindings())
  ->toEqual(['test']);

});