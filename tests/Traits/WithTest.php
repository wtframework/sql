<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select with cte', function ()
{

  expect(
    (string) SQL::select()
    ->with('test')
  )
  ->toEqual("WITH test SELECT *");

});

it('can select with multiple ctes', function ()
{

  expect(
    (string) SQL::select()
    ->with(['test1', 'test2'])
  )
  ->toEqual("WITH test1, test2 SELECT *");

});

it('can select with bound cte', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->with(SQL::bind('test'))
  )
  ->toEqual("WITH ? SELECT *");

  expect($stmt->bindings())
  ->toEqual(['test']);

});

it('can select with recursive cte', function ()
{

  expect(
    (string) SQL::select()
    ->withRecursive('test')
  )
  ->toEqual("WITH RECURSIVE test SELECT *");

});

it('can select with recursive multiple ctes', function ()
{

  expect(
    (string) SQL::select()
    ->withRecursive(['test1', 'test2'])
  )
  ->toEqual("WITH RECURSIVE test1, test2 SELECT *");

});

it('can select with recursive bound cte', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->withRecursive(SQL::bind('test'))
  )
  ->toEqual("WITH RECURSIVE ? SELECT *");

  expect($stmt->bindings())
  ->toEqual(['test']);

});