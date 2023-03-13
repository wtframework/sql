<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\Subquery;

it('can get', function ()
{

  expect((string) new Subquery('SELECT * FROM test'))
  ->toEqual('(SELECT * FROM test)');

});

it('can get with alias', function ()
{

  expect((string) new Subquery(
    'SELECT * FROM test',
    't1'
  ))
  ->toEqual('(SELECT * FROM test) AS t1');

});

it('can get with binding', function ()
{

  expect($subquery = new Subquery(
    stmt: 'SELECT * FROM test WHERE id = ?',
    bindings: 1
  ))
  ->toEqual('(SELECT * FROM test WHERE id = ?)');

  expect($subquery->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get with inherited binding', function ()
{

  expect($subquery = new Subquery(
    DBMS::SQLite->select()
    ->from('test')
    ->where('id', 1)
  ))
  ->toEqual('(SELECT * FROM test WHERE id = ?)');

  expect($subquery->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get lateral subquery', function ()
{

  expect(
    (string) (new Subquery('SELECT * FROM test'))
    ->lateral()
  )
  ->toEqual('LATERAL (SELECT * FROM test)');

});