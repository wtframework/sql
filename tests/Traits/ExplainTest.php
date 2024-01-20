<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can explain', function ()
{

  expect(
    (string) SQL::select()
    ->explain()
  )
  ->toEqual('EXPLAIN SELECT *');

});

it('can explain extended', function ()
{

  expect(
    (string) SQL::select()
    ->explainExtended()
  )
  ->toEqual('EXPLAIN EXTENDED SELECT *');

});

it('can explain partitions', function ()
{

  expect(
    (string) SQL::select()
    ->explainPartitions()
  )
  ->toEqual('EXPLAIN PARTITIONS SELECT *');

});

it('can explain format json', function ()
{

  expect(
    (string) SQL::select()
    ->explainFormatJSON()
  )
  ->toEqual('EXPLAIN FORMAT=JSON SELECT *');

});

it('can explain query plan', function ()
{

  expect(
    (string) SQL::select()
    ->explainQueryPlan()
  )
  ->toEqual('EXPLAIN QUERY PLAN SELECT *');

});

it('can analyse', function ()
{

  expect(
    (string) SQL::select()
    ->analyze()
  )
  ->toEqual('ANALYZE SELECT *');

});

it('can analyze format json', function ()
{

  expect(
    (string) SQL::select()
    ->analyzeFormatJSON()
  )
  ->toEqual('ANALYZE FORMAT=JSON SELECT *');

});