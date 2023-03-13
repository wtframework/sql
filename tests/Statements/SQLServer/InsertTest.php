<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLServer);

it('can insert', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
  )
  ->toEqual('INSERT INTO test DEFAULT VALUES');

});

it('can explain insert', function ()
{

  expect(
    (string) $this->sql->insert()
    ->explain()
  )
  ->toEqual('EXPLAIN INSERT DEFAULT VALUES');

});

it('can insert with cte', function ()
{

  expect(
    (string) $this->sql->insert()
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
    ->into('test')
  )
  ->toEqual('WITH cte AS (SELECT 1 UNION SELECT 2) INSERT INTO test DEFAULT VALUES');

});

it('can insert top', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->top(10)
  )
  ->toEqual('INSERT TOP (10) INTO test DEFAULT VALUES');

});

it('can insert with column', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->column('test')
  )
  ->toEqual('INSERT INTO test (test) DEFAULT VALUES');

});

it('can insert values', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->values([1, 2])
  )
  ->toEqual('INSERT INTO test VALUES (?, ?)');

});

it('can insert select', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test1')
    ->select('SELECT * FROM test2')
  )
  ->toEqual('INSERT INTO test1 SELECT * FROM test2');

});