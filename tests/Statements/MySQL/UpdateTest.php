<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MySQL);

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

it('can update low priority', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->lowPriority()
  )
  ->toEqual('UPDATE LOW_PRIORITY test');

});

it('can update ignore', function ()
{

  expect(
    (string) $this->sql->update()
    ->table('test')
    ->ignore()
  )
  ->toEqual('UPDATE IGNORE test');

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