<?php

declare(strict_types=1);

use WTFramework\SQL\CTE;
use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can select with cte string', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
  )
  ->toEqual('WITH cte AS (SELECT 1 UNION SELECT 2) SELECT *');

});

it('can select with cte object', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->with(new CTE(
      'cte',
      DBMS::SQLite->select()
      ->column(SQL::bind(1))
      ->union(
        DBMS::SQLite->select()
        ->column(SQL::bind(2))
      )
    ))
  )
  ->toEqual('WITH cte AS (SELECT ? UNION SELECT ?) SELECT *');

});

it('can select with recursive cte', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->withRecursive('cte AS (SELECT 1 UNION SELECT 2)')
  )
  ->toEqual('WITH RECURSIVE cte AS (SELECT 1 UNION SELECT 2) SELECT *');

  expect(
    (string) DBMS::SQLite->select()
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
    ->recursive()
  )
  ->toEqual('WITH RECURSIVE cte AS (SELECT 1 UNION SELECT 2) SELECT *');

});

it('can select with multiple ctes', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->with([
      'cte1 AS (SELECT 1 UNION SELECT 2)',
      'cte2 AS (SELECT 1 UNION SELECT 2)',
    ])
  )
  ->toEqual(
    'WITH cte1 AS (SELECT 1 UNION SELECT 2), '
  . 'cte2 AS (SELECT 1 UNION SELECT 2) SELECT *',
  );

});