<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\On;
use WTFramework\SQL\SQL;
use WTFramework\SQL\Statements\Select;

it('can use', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test')
  )
  ->toEqual('SELECT * JOIN test');

});

it('can left join', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->leftJoin('test')
  )
  ->toEqual('SELECT * LEFT JOIN test');

});

it('can straight join', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->straightJoin('test')
  )
  ->toEqual('SELECT * STRAIGHT_JOIN test');

});

it('can right join', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->rightJoin('test')
  )
  ->toEqual('SELECT * RIGHT JOIN test');

});

it('can cross join', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->crossJoin('test')
  )
  ->toEqual('SELECT * CROSS JOIN test');

});

it('can natural join', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->naturalJoin('test')
  )
  ->toEqual('SELECT * NATURAL JOIN test');

});

it('can natural left join', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->naturalLeftJoin('test')
  )
  ->toEqual('SELECT * NATURAL LEFT JOIN test');

});

it('can natural right join', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->naturalRightJoin('test')
  )
  ->toEqual('SELECT * NATURAL RIGHT JOIN test');

});

it('can join using column', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', 'test2')
  )
  ->toEqual('SELECT * JOIN test1 USING (test2)');

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', ['test2', 'test3'])
  )
  ->toEqual('SELECT * JOIN test1 USING (test2, test3)');

});

it('can join on equals', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', 'test2', 'test3')
  )
  ->toEqual('SELECT * JOIN test1 ON test2 = test3');

});

it('can join on in', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', 'test2', ['test3', 'test4'])
  )
  ->toEqual('SELECT * JOIN test1 ON test2 IN (test3, test4)');

});

it('can join on null', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', 'test2', null)
  )
  ->toEqual('SELECT * JOIN test1 ON test2 IS NULL');

});

it('can join on comparison', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', 'test2', '!=', 'test3')
  )
  ->toEqual('SELECT * JOIN test1 ON test2 != test3');

});

it('can join on between', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', 'test2', 'BETWEEN', ['test3', 'test4'])
  )
  ->toEqual('SELECT * JOIN test1 ON test2 BETWEEN test3 AND test4');

});

it('can join on equals binding', function ()
{

  expect(
    (string) $stmt = DBMS::SQLite->select()
    ->join('test1', SQL::bind('test1'), SQL::bindVar($test2))
  )
  ->toEqual('SELECT * JOIN test1 ON ? = ?');

  $test2 = 'test2';

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 'test1',
    'type' => \PDO::PARAM_STR,
  ], [
    'var' => 'test2',
    'type' => \PDO::PARAM_STR,
    'maxLength' => 0,
    'driverOptions' => null,
  ]]);

});

it('can join on closure', function ()
{

  expect(
    (string) DBMS::SQLite->select()
    ->join('test1', function ($join)
    {
      $join->on('test2', 'test3')
      ->on('test4', 'test5');
    })
  )
  ->toEqual('SELECT * JOIN test1 ON (test2 = test3 AND test4 = test5)');

});

it('can use on equals', function ()
{

  expect((string) $on = new On('test', 1))
  ->toEqual('test = ?');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on in', function ()
{

  expect((string) $on = new On('test', [1, 2]))
  ->toEqual('test IN (?, ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on null', function ()
{

  expect((string) new On('test', null))
  ->toEqual('test IS NULL');

});

it('can use on equals raw', function ()
{

  expect((string) new On('test', SQL::raw('test')))
  ->toEqual('test = test');

});

it('can use on equals bound var', function ()
{

  expect((string) $on = new On('test', SQL::bindVar($test)))
  ->toEqual('test = ?');

  $test = 'test';

  expect($on->bindings())
  ->toEqual([[
    'var' => 'test',
    'type' => \PDO::PARAM_STR,
    'maxLength' => 0,
    'driverOptions' => null,
  ]]);

});

it('can use on comparison', function ()
{

  expect((string) $on = new On('test', '!=', 1))
  ->toEqual('test != ?');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on between', function ()
{

  expect((string) $on = new On('test', 'BETWEEN', [1, 2]))
  ->toEqual('test BETWEEN ? AND ?');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on bound value equals', function ()
{

  expect((string) $on = new On(SQL::bind('test'), 1))
  ->toEqual('? = ?');

  expect($on->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on bound var equals', function ()
{

  expect((string) $on = new On(SQL::bindVar($test), 1))
  ->toEqual('? = ?');

  $test = 'test';

  expect($on->bindings())
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

it('can use on equals subquery', function ()
{

  expect(
    (string) $on = new On('test', SQL::subquery(
      DBMS::SQLite->select()
      ->column('test')
      ->from('test')
      ->where('test', 1)
      ->limit(1)
    ))
  )
  ->toEqual('test = (SELECT test FROM test WHERE test = ? LIMIT 1)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use multiple ons', function ()
{

  expect(
    (string) $on = new On([
      ['test1', 1],
      ['test2', 2]
    ])
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and on', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->on('test2', 2)
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and not on', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->onNot('test2', 2)
  )
  ->toEqual('(test1 = ? AND NOT test2 = ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or on', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->orOn('test2', 2)
  )
  ->toEqual('(test1 = ? OR test2 = ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or not on', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->orOnNot('test2', 2)
  )
  ->toEqual('(test1 = ? OR NOT test2 = ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on exists', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->onExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? AND EXISTS (SELECT * WHERE test2 = ?))');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on not exists', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->onNotExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? AND NOT EXISTS (SELECT * WHERE test2 = ?))');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or on exists', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->orOnExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? OR EXISTS (SELECT * WHERE test2 = ?))');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use or on not exists', function ()
{

  expect(
    (string) $on = (new On('test1', 1))
    ->orOnNotExists(
      (new Select(DBMS::SQLite))
      ->where('test2', 2)
    )
  )
  ->toEqual('(test1 = ? OR NOT EXISTS (SELECT * WHERE test2 = ?))');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use on raw', function ()
{

  expect((string) (new On)->onRaw('test = test'))
  ->toEqual('test = test');

});

it('can use on raw with binding', function ()
{

  expect(
    (string) $on = (new On)
    ->onRaw('test = ?', 1)
  )
  ->toEqual('test = ?');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

  expect(
    (string) $on = (new On)
    ->onRaw('test IN (?, ?)', [1, 2])
  )
  ->toEqual('test IN (?, ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use and on raw', function ()
{

  expect(
    (string) (new On)->onRaw('test1 = test1')
    ->onRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 AND test2 = test2)');

});

it('can use and not on raw', function ()
{

  expect(
    (string) (new On)->onRaw('test1 = test1')
    ->onNotRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 AND NOT test2 = test2)');

});

it('can use or on raw', function ()
{

  expect(
    (string) (new On)->onRaw('test1 = test1')
    ->orOnRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 OR test2 = test2)');

});

it('can use or not on raw', function ()
{

  expect(
    (string) (new On)->onRaw('test1 = test1')
    ->orOnNotRaw('test2 = test2')
  )
  ->toEqual('(test1 = test1 OR NOT test2 = test2)');

});

it('can use on closure', function ()
{

  expect(
    (string) $on = new On(function ($on)
    {
      $on->on('test1', 1)
      ->on('test2', 2);
    })
  )
  ->toEqual('(test1 = ? AND test2 = ?)');

  expect($on->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});