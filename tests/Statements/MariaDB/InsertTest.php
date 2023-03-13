<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MariaDB);

it('can insert', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
  )
  ->toEqual('INSERT INTO test VALUES ()');

});

it('can insert low priority', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->lowPriority()
  )
  ->toEqual('INSERT LOW_PRIORITY INTO test VALUES ()');

});

it('can insert ignore', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->ignore()
  )
  ->toEqual('INSERT IGNORE INTO test VALUES ()');

});

it('can insert with column', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->column('test')
  )
  ->toEqual('INSERT INTO test (test) VALUES ()');

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

it('can insert set', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->set('test', 1)
  )
  ->toEqual('INSERT INTO test SET test = ?');

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

it('can insert on duplicate key update', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->values([1])
    ->onDuplicateKeyUpdate('test', 'test')
  )
  ->toEqual('INSERT INTO test VALUES (?) ON DUPLICATE KEY UPDATE test = ?');

});

it('can insert returning all', function ()
{

  expect(
    (string) $this->sql->insert()
    ->into('test')
    ->returning()
  )
  ->toEqual('INSERT INTO test VALUES () RETURNING *');

});