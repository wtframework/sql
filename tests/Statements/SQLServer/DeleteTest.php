<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLServer);

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

it('can delete top', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->top(10)
  )
  ->toEqual('DELETE TOP (10) FROM test');

});

it('can delete join', function ()
{

  expect(
    (string) $this->sql->delete()
    ->table('test1')
    ->from('test1')
    ->join('test2')
  )
  ->toEqual('DELETE test1 FROM test1 JOIN test2');

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

it('can delete where current of', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->whereCurrentOf('test')
  )
  ->toEqual('DELETE FROM test WHERE CURRENT OF test');

});