<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

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

it('can insert or fail', function ()
{

  expect(
    (string) $this->sql->insert()
    ->orFail()
    ->into('test')
  )
  ->toEqual('INSERT OR FAIL INTO test DEFAULT VALUES');

});

it('can insert or ignore', function ()
{

  expect(
    (string) $this->sql->insert()
    ->orIgnore()
    ->into('test')
  )
  ->toEqual('INSERT OR IGNORE INTO test DEFAULT VALUES');

});

it('can insert or replace', function ()
{

  expect(
    (string) $this->sql->insert()
    ->orReplace()
    ->into('test')
  )
  ->toEqual('INSERT OR REPLACE INTO test DEFAULT VALUES');

});

it('can insert or roll back', function ()
{

  expect(
    (string) $this->sql->insert()
    ->orRollBack()
    ->into('test')
  )
  ->toEqual('INSERT OR ROLLBACK INTO test DEFAULT VALUES');

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

it('can insert on conflict', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->onConflict('DO NOTHING')
  )
  ->toEqual('INSERT INTO test DEFAULT VALUES ON CONFLICT DO NOTHING');

});

it('can insert returning all', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->returning()
  )
  ->toEqual('INSERT INTO test DEFAULT VALUES RETURNING *');

});