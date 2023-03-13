<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\Having;
use WTFramework\SQL\SQL;
use WTFramework\SQL\Statements\Select;

it('can use having equals', function ()
{

  expect((string) $having = new Having('test', 1))
  ->toEqual('test = ?');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having in', function ()
{

  expect((string) $having = new Having('test', [1, 2]))
  ->toEqual('test IN (?, ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having null', function ()
{

  expect((string) new Having('test', null))
  ->toEqual('test IS NULL');

});

it('can use having equals raw', function ()
{

  expect((string) new Having('test', SQL::raw('test')))
  ->toEqual('test = test');

});

it('can use having equals bound var', function ()
{

  expect((string) $having = new Having('test', SQL::bindVar($test)))
  ->toEqual('test = ?');

  $test = 'test';

  expect($having->bindings())
  ->toEqual([[
    'var' => 'test',
    'type' => \PDO::PARAM_STR,
    'maxLength' => 0,
    'driverOptions' => null,
  ]]);

});

it('can use having comparison', function ()
{

  expect((string) $having = new Having('test', '!=', 1))
  ->toEqual('test != ?');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having between', function ()
{

  expect((string) $having = new Having('test', 'BETWEEN', [1, 2]))
  ->toEqual('test BETWEEN ? AND ?');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having bound value equals', function ()
{

  expect((string) $having = new Having(SQL::bind('test'), 1))
  ->toEqual('? = ?');

  expect($having->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having bound var equals', function ()
{

  expect((string) $having = new Having(SQL::bindVar($test), 1))
  ->toEqual('? = ?');

  $test = 'test';

  expect($having->bindings())
  ->toEqual([[
    'var' => 'test',
    'type' => \PDO::PARAM_STR,
    'maxLength' => 0,
    'driverOptions' => null,
  ], [
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having equals subquery', function ()
{

  expect(
    (string) $having = new Having('test', SQL::subquery(
      DBMS::SQLite->select()
      ->column('test')
      ->from('test')
      ->where('test', 1)
      ->limit(1)
    ))
  )
  ->toEqual('test = (SELECT test FROM test WHERE test = ? LIMIT 1)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use multiple havings', function ()
{

  expect(
    (string) $having = new Having([
      ['test1', 1],
      ['test2', 2]
    ])
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and having', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->having('test2', 2)
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and not having', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->havingNot('test2', 2)
  )
  ->toEqual('(test1 = ? AND NOT test2 = ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or having', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->orHaving('test2', 2)
  )
  ->toEqual('(test1 = ? OR test2 = ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or not having', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->orHavingNot('test2', 2)
  )
  ->toEqual('(test1 = ? OR NOT test2 = ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having exists', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->havingExists(
      (new Select(DBMS::SQLite))
      ->having('test2', 2)
    )
  )
  ->toEqual('(test1 = ? AND EXISTS (SELECT * HAVING test2 = ?))');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having not exists', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->havingNotExists(
      (new Select(DBMS::SQLite))
      ->having('test2', 2)
    )
  )
  ->toEqual('(test1 = ? AND NOT EXISTS (SELECT * HAVING test2 = ?))');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or having exists', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->orHavingExists(
      (new Select(DBMS::SQLite))
      ->having('test2', 2)
    )
  )
  ->toEqual('(test1 = ? OR EXISTS (SELECT * HAVING test2 = ?))');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or having not exists', function ()
{

  expect(
    (string) $having = (new Having('test1', 1))
    ->orHavingNotExists(
      (new Select(DBMS::SQLite))
      ->having('test2', 2)
    )
  )
  ->toEqual('(test1 = ? OR NOT EXISTS (SELECT * HAVING test2 = ?))');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use having raw', function ()
{

  expect((string) (new Having)->havingRaw('test = test'))
  ->toEqual('test = test');

});

it('can use having raw with binding', function ()
{

  expect(
    (string) $having = (new Having)
    ->havingRaw('test = ?', 1)
  )
  ->toEqual('test = ?');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

  expect(
    (string) $having = (new Having)
    ->havingRaw('test IN (?, ?)', [1, 2])
  )
  ->toEqual('test IN (?, ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and having raw', function ()
{

  expect(
    (string) (new Having)->havingRaw('test1 = test1')
    ->havingRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 AND test2 = test2)');

});

it('can use and not having raw', function ()
{

  expect(
    (string) (new Having)->havingRaw('test1 = test1')
    ->havingNotRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 AND NOT test2 = test2)');

});

it('can use or having raw', function ()
{

  expect(
    (string) (new Having)->havingRaw('test1 = test1')
    ->orHavingRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 OR test2 = test2)');

});

it('can use or not having raw', function ()
{

  expect(
    (string) (new Having)->havingRaw('test1 = test1')
    ->orHavingNotRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 OR NOT test2 = test2)');

});

it('can use having closure', function ()
{

  expect(
    (string) $having = new Having(function ($having)
    {
      $having->having('test1', 1)
      ->having('test2', 2);
    })
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($having->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});