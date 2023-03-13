<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLServer);

it('can select all', function ()
{

  expect(
    (string) $this->sql->select()
  )
  ->toEqual('SELECT *');

});

it('can explain select', function ()
{

  expect(
    (string) $this->sql->select()
    ->explain()
  )
  ->toEqual('EXPLAIN SELECT *');

});

it('can select from table', function ()
{

  expect(
    (string) $this->sql->select()
    ->from('test')
  )
  ->toEqual('SELECT * FROM test');

});

it('can select into', function ()
{

  expect(
    (string) $this->sql->select()
    ->into('test2')
    ->from('test1')
  )
  ->toEqual('SELECT * INTO test2 FROM test1');

});

it('can select with cte', function ()
{

  expect(
    (string) $this->sql->select()
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
  )
  ->toEqual('WITH cte AS (SELECT 1 UNION SELECT 2) SELECT *');

});

it('can select distinct', function ()
{

  expect(
    (string) $this->sql->select()
    ->distinct()
  )
  ->toEqual('SELECT DISTINCT *');

});

it('can select top', function ()
{

  expect(
    (string) $this->sql->select()
    ->top(10)
  )
  ->toEqual('SELECT TOP (10) *');

});

it('can select join', function ()
{

  expect(
    (string) $this->sql->select()
    ->from('test1')
    ->join('test2')
  )
  ->toEqual('SELECT * FROM test1 JOIN test2');

});

it('can select where', function ()
{

  expect(
    (string) $this->sql->select()
    ->where('test', 1)
  )
  ->toEqual('SELECT * WHERE test = ?');

});

it('can select group by', function ()
{

  expect(
    (string) $this->sql->select()
    ->groupBy('test')
  )
  ->toEqual('SELECT * GROUP BY test');

});

it('can select having', function ()
{

  expect(
    (string) $this->sql->select()
    ->having('test', 1)
  )
  ->toEqual('SELECT * HAVING test = ?');

});

it('can select window', function ()
{

  expect(
    (string) $this->sql->select()
    ->window('w', 'PARTITION BY test')
  )
  ->toEqual('SELECT * WINDOW w AS (PARTITION BY test)');

});

it('can select union', function ()
{

  expect(
    (string) $this->sql->select()
    ->union('SELECT *')
  )
  ->toEqual('SELECT * UNION SELECT *');

});

it('can select intersect', function ()
{

  expect(
    (string) $this->sql->select()
    ->intersect('SELECT *')
  )
  ->toEqual('SELECT * INTERSECT SELECT *');

});

it('can select except', function ()
{

  expect(
    (string) $this->sql->select()
    ->except('SELECT *')
  )
  ->toEqual('SELECT * EXCEPT SELECT *');

});

it('can select order by', function ()
{

  expect(
    (string) $this->sql->select()
    ->orderBy('test')
  )
  ->toEqual('SELECT * ORDER BY test ASC');

});

it('can select fetch rows', function ()
{

  expect(
    (string) $this->sql->select()
    ->fetch(10)
  )
  ->toEqual('SELECT * FETCH NEXT 10 ROWS ONLY');

});