<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

it('can update set', function ()
{

  expect(
    (string) DBMS::MariaDB->update()
    ->table('test')
    ->set('test', 1)
  )
  ->toEqual('UPDATE test SET test = ?');

});

it('can update set multiple', function ()
{

  expect(
    (string) DBMS::MariaDB->update()
    ->table('test')
    ->set([
      'test1' => 1,
      'test2' => 2,
    ])
  )
  ->toEqual('UPDATE test SET test1 = ?, test2 = ?');

});

it('can update returning all', function ()
{

  expect(
    (string) DBMS::PostgreSQL->update()
    ->table('test')
    ->returning()
  )
  ->toEqual('UPDATE test RETURNING *');

});

it('can update returning columns', function ()
{

  expect(
    (string) DBMS::PostgreSQL->update()
    ->table('test')
    ->returning(['test1', 'test2'])
  )
  ->toEqual('UPDATE test RETURNING test1, test2');

});