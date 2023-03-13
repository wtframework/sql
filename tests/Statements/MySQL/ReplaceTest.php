<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MySQL);

it('can replace', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
  )
  ->toEqual('REPLACE INTO test VALUES ()');

});

it('can explain replace', function ()
{

  expect(
    (string) $this->sql->replace()
    ->explain()
  )
  ->toEqual('EXPLAIN REPLACE VALUES ()');

});

it('can replace low priority', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
    ->lowPriority()
  )
  ->toEqual('REPLACE LOW_PRIORITY INTO test VALUES ()');

});

it('can replace delayed', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
    ->delayed()
  )
  ->toEqual('REPLACE DELAYED INTO test VALUES ()');

});

it('can replace with column', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
    ->column('test')
  )
  ->toEqual('REPLACE INTO test (test) VALUES ()');

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

it('can replace set', function ()
{

  expect(
    (string) $this->sql->replace()
    ->into('test')
    ->set('test', 1)
  )
  ->toEqual('REPLACE INTO test SET test = ?');

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