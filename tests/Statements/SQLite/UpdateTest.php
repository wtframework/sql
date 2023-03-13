<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

it('can update', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
  )
  ->toEqual('UPDATE test');

});

it('can explain update', function ()
{

  expect(
    (string) $this->sql->update()
    ->explain()
  )
  ->toEqual('EXPLAIN UPDATE');

});

it('can update with cte', function ()
{

  expect(
    (string) $this->sql->update()
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
    ->table('test')
  )
  ->toEqual('WITH cte AS (SELECT 1 UNION SELECT 2) UPDATE test');

});

it('can update or fail', function ()
{

  expect(
    (string) $this->sql->update()
    ->orFail()
    ->table('test')
  )
  ->toEqual('UPDATE OR FAIL test');

});

it('can update or ignore', function ()
{

  expect(
    (string) $this->sql->update()
    ->orIgnore()
    ->table('test')
  )
  ->toEqual('UPDATE OR IGNORE test');

});

it('can update or replace', function ()
{

  expect(
    (string) $this->sql->update()
    ->orReplace()
    ->table('test')
  )
  ->toEqual('UPDATE OR REPLACE test');

});

it('can update or roll back', function ()
{

  expect(
    (string) $this->sql->update()
    ->orRollBack()
    ->table('test')
  )
  ->toEqual('UPDATE OR ROLLBACK test');

});

it('can update from', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test1')
    ->from('test2')
  )
  ->toEqual('UPDATE test1 FROM test2');

});

it('can update join', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test1')
    ->join('test2')
  )
  ->toEqual('UPDATE test1 JOIN test2');

});

it('can update set', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->set('test', 1)
  )
  ->toEqual('UPDATE test SET test = ?');

});

it('can update where', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->where('test', 2)
  )
  ->toEqual('UPDATE test WHERE test = ?');

});

it('can update order by', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->orderBy('test')
  )
  ->toEqual('UPDATE test ORDER BY test ASC');

});

it('can update limit', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->limit(10)
  )
  ->toEqual('UPDATE test LIMIT 10');

});

it('can update offset', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->limit(10, 10)
  )
  ->toEqual('UPDATE test LIMIT 10 OFFSET 10');

});

it('can update returning all', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->returning()
  )
  ->toEqual('UPDATE test RETURNING *');

});