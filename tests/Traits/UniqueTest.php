<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set unique', function ()
{

  expect(
    (string) SQL::create()
    ->unique('test')
  )
  ->toEqual("CREATE TABLE (UNIQUE (test))");

});

it('can set unique multiple column', function ()
{

  expect(
    (string) SQL::create()
    ->unique(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE (UNIQUE (test1, test2))");

});

it('can set multiple uniques', function ()
{

  expect(
    (string) SQL::create()
    ->unique([['test1'], ['test2']])
  )
  ->toEqual("CREATE TABLE (UNIQUE (test1), UNIQUE (test2))");

});

it('can set multiple uniques multiple column', function ()
{

  expect(
    (string) SQL::create()
    ->unique([
      ['test1', 'test2'],
      ['test3', 'test4'],
    ])
  )
  ->toEqual("CREATE TABLE (UNIQUE (test1, test2), UNIQUE (test3, test4))");

});