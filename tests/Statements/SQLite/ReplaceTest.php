<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

it('can replace', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
  )
  ->toEqual('REPLACE INTO test DEFAULT VALUES');

});

it('can explain replace', function ()
{

  expect(
    (string) $this->sql->replace()
    ->explain()
  )
  ->toEqual('EXPLAIN REPLACE DEFAULT VALUES');

});

it('can replace with cte', function ()
{

  expect(
    (string) $this->sql->replace()
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
    ->into('test')
  )
  ->toEqual('WITH cte AS (SELECT 1 UNION SELECT 2) REPLACE INTO test DEFAULT VALUES');

});

it('can replace with column', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
    ->column('test')
  )
  ->toEqual('REPLACE INTO test (test) DEFAULT VALUES');

});

it('can replace values', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
    ->values([1, 2])
  )
  ->toEqual('REPLACE INTO test VALUES (?, ?)');

});

it('can replace select', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test1')
    ->select('SELECT * FROM test2')
  )
  ->toEqual('REPLACE INTO test1 SELECT * FROM test2');

});

it('can replace returning all', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
    ->returning()
  )
  ->toEqual('REPLACE INTO test DEFAULT VALUES RETURNING *');

});