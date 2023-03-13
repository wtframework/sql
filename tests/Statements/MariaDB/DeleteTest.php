<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

beforeEach(fn () => $this->sql = DBMS::MariaDB);

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

it('can delete using', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test1')
    ->using('test2')
  )
  ->toEqual('DELETE FROM test1 USING test2');

});

it('can delete for portion', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->forPortionOf('date_period', '2022-01-01', SQL::raw('CURDATE()'))
  )
  ->toEqual('DELETE FROM test FOR PORTION OF date_period FROM ? TO CURDATE()');

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

it('can delete returning all', function ()
{

  expect(
    (string) $this->sql->delete()
    ->from('test')
    ->returning()
  )
  ->toEqual('DELETE FROM test RETURNING *');

});