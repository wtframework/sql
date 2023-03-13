<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLServer);

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

it('can update top', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->top(10)
  )
  ->toEqual('UPDATE TOP (10) test');

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

it('can update where current of', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->whereCurrentOf('test')
  )
  ->toEqual('UPDATE test WHERE CURRENT OF test');

});