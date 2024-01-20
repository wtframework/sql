<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\SQL;

it('can set top', function ()
{

  expect(
    (string) SQL::select()
    ->use(Grammar::TSQL)
    ->top(10)
  )
  ->toEqual("SELECT TOP (10) *");

});

it('can set top with ties', function ()
{

  expect(
    (string) SQL::select()
    ->use(Grammar::TSQL)
    ->topWithTies(10)
  )
  ->toEqual("SELECT TOP (10) WITH TIES *");

});

it('can set top percent', function ()
{

  expect(
    (string) SQL::select()
    ->use(Grammar::TSQL)
    ->topPercent(10)
  )
  ->toEqual("SELECT TOP (10) PERCENT *");

});

it('can set top percent with ties', function ()
{

  expect(
    (string) SQL::select()
    ->use(Grammar::TSQL)
    ->topPercentWithTies(10)
  )
  ->toEqual("SELECT TOP (10) PERCENT WITH TIES *");

});

it('can set top bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->use(Grammar::TSQL)
    ->top(SQL::bind(1))
  )
  ->toEqual("SELECT TOP (?) *");

  expect($stmt->bindings())
  ->toEqual([1]);

});