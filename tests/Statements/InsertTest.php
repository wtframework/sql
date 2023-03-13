<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can insert low priority', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->lowPriority()
  )
  ->toEqual('INSERT LOW_PRIORITY INTO test VALUES ()');

});

it('can insert delayed', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->delayed()
  )
  ->toEqual('INSERT DELAYED INTO test VALUES ()');

});

it('can insert high priority', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->highPriority()
  )
  ->toEqual('INSERT HIGH_PRIORITY INTO test VALUES ()');

});

it('can insert with column', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->column('test')
  )
  ->toEqual('INSERT INTO test (test) VALUES ()');

});

it('can insert with multiple columns', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->column(['test1', 'test2'])
  )
  ->toEqual('INSERT INTO test (test1, test2) VALUES ()');

});

it('can insert values', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->values([1, 2])
  )
  ->toEqual('INSERT INTO test VALUES (?, ?)');

});

it('can insert multiple row values', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->values([
      [1, 2],
      [3, 4]
    ])
  )
  ->toEqual('INSERT INTO test VALUES (?, ?), (?, ?)');

});

it('can insert raw values', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->values([SQL::raw('DEFAULT'), null])
  )
  ->toEqual('INSERT INTO test VALUES (DEFAULT, NULL)');

});

it('can insert set', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->set('test', 1)
  )
  ->toEqual('INSERT INTO test SET test = ?');

});

it('can insert multiple set', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->set([
      'test1' => 1,
      'test2' => 2,
    ])
  )
  ->toEqual('INSERT INTO test SET test1 = ?, test2 = ?');

});

it('can insert on duplicate key update', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->values([1])
    ->onDuplicateKeyUpdate('test', 'test')
  )
  ->toEqual('INSERT INTO test VALUES (?) ON DUPLICATE KEY UPDATE test = ?');

});

it('can insert on duplicate key update raw', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->values([1])
    ->onDuplicateKeyUpdate('test', SQL::raw('test2'))
  )
  ->toEqual('INSERT INTO test VALUES (?) ON DUPLICATE KEY UPDATE test = test2');

});

it('can insert multiple on duplicate key update', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->values([1])
    ->onDuplicateKeyUpdate([
      'test1' => 'test1',
      'test2' => 'test2',
    ])
  )
  ->toEqual(
    'INSERT INTO test VALUES (?) '
  . 'ON DUPLICATE KEY UPDATE test1 = ?, test2 = ?'
  );

});

it('can insert on conflict string', function ()
{

  expect(
    (string) DBMS::PostgreSQL->insert()
    ->into('test')
    ->onConflict('DO NOTHING')
  )
  ->toEqual('INSERT INTO test DEFAULT VALUES ON CONFLICT DO NOTHING');

});

it('can insert on conflict object', function ()
{

  expect(
    (string) DBMS::PostgreSQL->insert()
    ->into('test')
    ->onConflict(SQL::upsert())
  )
  ->toEqual('INSERT INTO test DEFAULT VALUES ON CONFLICT DO NOTHING');

});

it('can insert returning all', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->returning()
  )
  ->toEqual('INSERT INTO test VALUES () RETURNING *');

});

it('can insert returning columns', function ()
{

  expect(
    (string) DBMS::MariaDB->insert()
    ->into('test')
    ->returning(['test1', 'test2'])
  )
  ->toEqual('INSERT INTO test VALUES () RETURNING test1, test2');

});