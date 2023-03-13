<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MySQL);

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

it('can delete low priority', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->lowPriority()
  )
  ->toEqual('DELETE LOW_PRIORITY FROM test');

});

it('can delete quick', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->quick()
  )
  ->toEqual('DELETE QUICK FROM test');

});

it('can delete ignore', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->ignore()
  )
  ->toEqual('DELETE IGNORE FROM test');

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