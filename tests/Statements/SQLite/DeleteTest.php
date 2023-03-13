<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

it('can delete', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
  )
  ->toEqual('DELETE FROM test');

});

it('can explain delete', function ()
{

  expect(
    (string) $this->sql->delete()
    ->explain()
  )
  ->toEqual('EXPLAIN DELETE');

});

it('can delete with cte', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
  )
  ->toEqual('WITH cte AS (SELECT 1 UNION SELECT 2) DELETE FROM test');

});

it('can delete where', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->where('test', 2)
  )
  ->toEqual('DELETE FROM test WHERE test = ?');

});

it('can delete order by', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->orderBy('test')
  )
  ->toEqual('DELETE FROM test ORDER BY test ASC');

});

it('can delete limit', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->limit(10)
  )
  ->toEqual('DELETE FROM test LIMIT 10');

});

it('can delete offset', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->limit(10, 10)
  )
  ->toEqual('DELETE FROM test LIMIT 10 OFFSET 10');

});

it('can delete returning all', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->returning()
  )
  ->toEqual('DELETE FROM test RETURNING *');

});