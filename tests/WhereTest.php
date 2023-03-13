<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;
use WTFramework\SQL\Where;
use WTFramework\SQL\Statements\Select;

it('can use where equals', function ()
{

  expect((string) $where = new Where('test', 1))
  ->toEqual('test = ?');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where in', function ()
{

  expect((string) $where = new Where('test', [1, 2]))
  ->toEqual('test IN (?, ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where null', function ()
{

  expect((string) new Where('test', null))
  ->toEqual('test IS NULL');

});

it('can use where equals raw', function ()
{

  expect((string) new Where('test', SQL::raw('test')))
  ->toEqual('test = test');

});

it('can use where equals bound var', function ()
{

  expect((string) $where = new Where('test', SQL::bindVar($test)))
  ->toEqual('test = ?');

  $test = 'test';

  expect($where->bindings())
  ->toEqual([[
    'var' => 'test',
    'type' => \PDO::PARAM_STR,
    'maxLength' => 0,
    'driverOptions' => null,
  ]]);

});

it('can use where comparison', function ()
{

  expect((string) $where = new Where('test', '!=', 1))
  ->toEqual('test != ?');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where between', function ()
{

  expect((string) $where = new Where('test', 'BETWEEN', [1, 2]))
  ->toEqual('test BETWEEN ? AND ?');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where bound value equals', function ()
{

  expect((string) $where = new Where(SQL::bind('test'), 1))
  ->toEqual('? = ?');

  expect($where->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where bound var equals', function ()
{

  expect((string) $where = new Where(SQL::bindVar($test), 1))
  ->toEqual('? = ?');

  $test = 'test';

  expect($where->bindings())
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

it('can use where equals subquery', function ()
{

  expect(
    (string) $where = new Where('test', SQL::subquery(
      DBMS::SQLite->select()
      ->column('test')
      ->from('test')
      ->where('test', 1)
      ->limit(1)
    ))
  )
  ->toEqual('test = (SELECT test FROM test WHERE test = ? LIMIT 1)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use multiple wheres', function ()
{

  expect(
    (string) $where = new Where([
      ['test1', 1],
      ['test2', 2]
    ])
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and where', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->where('test2', 2)
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and not where', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->whereNot('test2', 2)
  )
  ->toEqual('(test1 = ? AND NOT test2 = ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or where', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->orWhere('test2', 2)
  )
  ->toEqual('(test1 = ? OR test2 = ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or not where', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->orWhereNot('test2', 2)
  )
  ->toEqual('(test1 = ? OR NOT test2 = ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where exists', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->whereExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? AND EXISTS (SELECT * WHERE test2 = ?))');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where not exists', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->whereNotExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? AND NOT EXISTS (SELECT * WHERE test2 = ?))');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or where exists', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->orWhereExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? OR EXISTS (SELECT * WHERE test2 = ?))');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or where not exists', function ()
{

  expect(
    (string) $where = (new Where('test1', 1))
    ->orWhereNotExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? OR NOT EXISTS (SELECT * WHERE test2 = ?))');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use where raw', function ()
{

  expect((string) (new Where)->whereRaw('test = test'))
  ->toEqual('test = test');

});

it('can use where raw with binding', function ()
{

  expect(
    (string) $where = (new Where)
    ->whereRaw('test = ?', 1)
  )
  ->toEqual('test = ?');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

  expect(
    (string) $where = (new Where)
    ->whereRaw('test IN (?, ?)', [1, 2])
  )
  ->toEqual('test IN (?, ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and where raw', function ()
{

  expect(
    (string) (new Where)->whereRaw('test1 = test1')
    ->whereRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 AND test2 = test2)');

});

it('can use and not where raw', function ()
{

  expect(
    (string) (new Where)->whereRaw('test1 = test1')
    ->whereNotRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 AND NOT test2 = test2)');

});

it('can use or where raw', function ()
{

  expect(
    (string) (new Where)->whereRaw('test1 = test1')
    ->orWhereRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 OR test2 = test2)');

});

it('can use or not where raw', function ()
{

  expect(
    (string) (new Where)->whereRaw('test1 = test1')
    ->orWhereNotRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 OR NOT test2 = test2)');

});

it('can use where closure', function ()
{

  expect(
    (string) $where = new Where(function ($where)
    {
      $where->where('test1', 1)
      ->where('test2', 2);
    })
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($where->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});