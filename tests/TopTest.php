<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

it('can select with top', function ()
{

  expect(
    (string) DBMS::SQLServer->select()
    ->top(10)
  )
  ->toEqual('SELECT TOP (10) *');

});

it('can select with top percent', function ()
{

  expect(
    (string) DBMS::SQLServer->select()
    ->topPercent(10)
  )
  ->toEqual('SELECT TOP (10) PERCENT *');

});

it('can select with top with ties', function ()
{

  expect(
    (string) DBMS::SQLServer->select()
    ->topWithTies(10)
  )
  ->toEqual('SELECT TOP (10) WITH TIES *');

});

it('can select with top percent with ties', function ()
{

  expect(
    (string) DBMS::SQLServer->select()
    ->topPercentWithTies(10)
  )
  ->toEqual('SELECT TOP (10) PERCENT WITH TIES *');

});