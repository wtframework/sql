<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

it('can explain', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->explain()
  )
  ->toEqual('EXPLAIN SELECT *');

});

it('can explain extended', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->explainExtended()
  )
  ->toEqual('EXPLAIN EXTENDED SELECT *');

});

it('can explain partitions', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->explainPartitions()
  )
  ->toEqual('EXPLAIN PARTITIONS SELECT *');

});

it('can explain format json', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->explainFormatJSON()
  )
  ->toEqual('EXPLAIN FORMAT=JSON SELECT *');

});

it('can explain analyze', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->explainAnalyze()
  )
  ->toEqual('EXPLAIN ANALYZE SELECT *');

});

it('can explain query plan', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->explainQueryPlan()
  )
  ->toEqual('EXPLAIN QUERY PLAN SELECT *');

});