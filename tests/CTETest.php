<?php

declare(strict_types=1);

use WTFramework\SQL\CTE;
use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can get', function ()
{

  expect(
    (string) new CTE(
      'cte',
      'SELECT 1'
    )
  )
  ->toEqual('cte AS (SELECT 1)');

});

it('can get with bindings', function ()
{

  expect(
    (string) $cte = new CTE(
      'cte',
      DBMS::SQLite->select()
      ->column(SQL::bind(1))
    )
  )
  ->toEqual('cte AS (SELECT ?)');

  expect($cte->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get with column', function ()
{

  expect(
    (string) new CTE(
      'cte',
      'SELECT 1',
      'test'
    )
  )
  ->toEqual('cte (test) AS (SELECT 1)');

  expect(
    (string) new CTE(
      'cte',
      'SELECT 1',
      ['test1', 'test2']
    )
  )
  ->toEqual('cte (test1, test2) AS (SELECT 1)');

});

it('can get as materialized', function ()
{

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->materialized()
  )
  ->toEqual('cte AS MATERIALIZED (SELECT 1)');

});

it('can get as not materialized', function ()
{

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->notMaterialized()
  )
  ->toEqual('cte AS NOT MATERIALIZED (SELECT 1)');

});

it('can get with search breadth', function ()
{

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->searchBreadth(
      'test1',
      'test2'
    )
  )
  ->toEqual('cte AS (SELECT 1) SEARCH BREADTH FIRST BY test1 SET test2');

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->searchBreadth(
      ['test1', 'test2'],
      'test3'
    )
  )
  ->toEqual('cte AS (SELECT 1) SEARCH BREADTH FIRST BY test1, test2 SET test3');

});

it('can get with search depth', function ()
{

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->searchDepth(
      'test1',
      'test2'
    )
  )
  ->toEqual('cte AS (SELECT 1) SEARCH DEPTH FIRST BY test1 SET test2');

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->searchDepth(
      ['test1', 'test2'],
      'test3'
    )
  )
  ->toEqual('cte AS (SELECT 1) SEARCH DEPTH FIRST BY test1, test2 SET test3');

});

it('can get with cycle column', function ()
{

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->cycle('test1')
    ->set('test2')
    ->using('test3')
  )
  ->toEqual('cte AS (SELECT 1) CYCLE test1 SET test2 USING test3');

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->cycle(['test1', 'test2'])
    ->set('test3')
    ->using('test4')
  )
  ->toEqual('cte AS (SELECT 1) CYCLE test1, test2 SET test3 USING test4');

});

it('can get with cycle to default', function ()
{

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->cycle('test1')
    ->set('test2')
    ->using('test3')
    ->to(2)
    ->default(1)
  )
  ->toEqual(
    'cte AS (SELECT 1) CYCLE test1 SET test2 TO 2 DEFAULT 1 USING test3'
  );

});

it('can get with cycle restrict column', function ()
{

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->cycleRestrict('test')
  )
  ->toEqual('cte AS (SELECT 1) CYCLE test RESTRICT');

  expect(
    (string) (new CTE(
      'cte',
      'SELECT 1'
    ))
    ->cycleRestrict(['test1', 'test2'])
  )
  ->toEqual('cte AS (SELECT 1) CYCLE test1, test2 RESTRICT');

});