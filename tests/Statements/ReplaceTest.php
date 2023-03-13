<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can replace with column', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->column('test')
  )
  ->toEqual('REPLACE INTO test (test) VALUES ()');

});

it('can replace with multiple columns', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->column(['test1', 'test2'])
  )
  ->toEqual('REPLACE INTO test (test1, test2) VALUES ()');

});

it('can replace values', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->values([1, 2])
  )
  ->toEqual('REPLACE INTO test VALUES (?, ?)');

});

it('can replace multiple row values', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->values([
      [1, 2],
      [3, 4]
    ])
  )
  ->toEqual('REPLACE INTO test VALUES (?, ?), (?, ?)');

});

it('can replace raw values', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->values([SQL::raw('DEFAULT'), null])
  )
  ->toEqual('REPLACE INTO test VALUES (DEFAULT, NULL)');

});

it('can replace set', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->set('test', 1)
  )
  ->toEqual('REPLACE INTO test SET test = ?');

});

it('can replace multiple set', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->set([
      'test1' => 1,
      'test2' => 2,
    ])
  )
  ->toEqual('REPLACE INTO test SET test1 = ?, test2 = ?');

});

it('can replace returning all', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->returning()
  )
  ->toEqual('REPLACE INTO test VALUES () RETURNING *');

});

it('can replace returning columns', function ()
{

  expect(
    (string) DBMS::MariaDB->replace()
    ->into('test')
    ->returning(['test1', 'test2'])
  )
  ->toEqual('REPLACE INTO test VALUES () RETURNING test1, test2');

});