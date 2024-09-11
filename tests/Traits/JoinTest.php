<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;
use WTFramework\SQL\Services\On;

it('can join', function ()
{

  expect(
    (string) SQL::select()
    ->join('test')
  )
  ->toEqual("SELECT * JOIN test");

});

it('can left join', function ()
{

  expect(
    (string) SQL::select()
    ->leftJoin('test')
  )
  ->toEqual("SELECT * LEFT JOIN test");

});

it('can right join', function ()
{

  expect(
    (string) SQL::select()
    ->rightJoin('test')
  )
  ->toEqual("SELECT * RIGHT JOIN test");

});

it('can full join', function ()
{

  expect(
    (string) SQL::select()
    ->fullJoin('test')
  )
  ->toEqual("SELECT * FULL JOIN test");

});

it('can cross join', function ()
{

  expect(
    (string) SQL::select()
    ->crossJoin('test')
  )
  ->toEqual("SELECT * CROSS JOIN test");

});

it('can straight join', function ()
{

  expect(
    (string) SQL::select()
    ->straightJoin('test')
  )
  ->toEqual("SELECT * STRAIGHT_JOIN test");

});

it('can natural join', function ()
{

  expect(
    (string) SQL::select()
    ->naturalJoin('test')
  )
  ->toEqual("SELECT * NATURAL JOIN test");

});

it('can natural left join', function ()
{

  expect(
    (string) SQL::select()
    ->naturalLeftJoin('test')
  )
  ->toEqual("SELECT * NATURAL LEFT JOIN test");

});

it('can natural right join', function ()
{

  expect(
    (string) SQL::select()
    ->naturalRightJoin('test')
  )
  ->toEqual("SELECT * NATURAL RIGHT JOIN test");

});

it('can natural full join', function ()
{

  expect(
    (string) SQL::select()
    ->naturalFullJoin('test')
  )
  ->toEqual("SELECT * NATURAL FULL JOIN test");

});

it('can join using column', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', 'test2')
  )
  ->toEqual("SELECT * JOIN test1 USING (test2)");

});

it('can join using multiple columns', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', ['test2', 'test3'])
  )
  ->toEqual("SELECT * JOIN test1 USING (test2, test3)");

});

it('can join on equals', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', 'test2', 'test3')
  )
  ->toEqual("SELECT * JOIN test1 ON test2 = test3");

});

it('can join using multiple equals', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', ['test1' => 'test2', 'test3' => 'test4'])
  )
  ->toEqual("SELECT * JOIN test1 ON (test1 = test2 AND test3 = test4)");

});

it('can join on equals bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->join('test1', 'test2', SQL::bind('test3'))
  )
  ->toEqual("SELECT * JOIN test1 ON test2 = ?");

  expect($stmt->bindings())
  ->toEqual(['test3']);

});

it('can join on bound value equals', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->join('test1', SQL::bind('test2'), 'test3')
  )
  ->toEqual("SELECT * JOIN test1 ON ? = test3");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});

it('can join on defined comparison', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', 'test2', '<', 'test3')
  )
  ->toEqual("SELECT * JOIN test1 ON test2 < test3");

});

it('can join on using closure', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) => $o->on('test2', 'test3'))
  )
  ->toEqual("SELECT * JOIN test1 ON test2 = test3");

});

it('can join and on', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->on('test2', 'test3')
      ->on('test4', 'test5')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON (test2 = test3 AND test4 = test5)");

});

it('can join or on', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->on('test2', 'test3')
      ->orOn('test4', 'test5')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON (test2 = test3 OR test4 = test5)");

});

it('can join on not', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) => $o->onNot('test2', 'test3'))
  )
  ->toEqual("SELECT * JOIN test1 ON NOT test2 = test3");

});

it('can join or on not', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->on('test2', 'test3')
      ->orOnNot('test4', 'test5')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON (test2 = test3 OR NOT test4 = test5)");

});

it('can join on exists', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->onExists('test2')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON EXISTS (test2)");

});

it('can join or on exists', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->on('test2', 'test3')
      ->orOnExists('test4')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON (test2 = test3 OR EXISTS (test4))");

});

it('can join on not exists', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->onNotExists('test2')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON NOT EXISTS (test2)");

});

it('can join or on not exists', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->on('test2', 'test3')
      ->orOnNotExists('test4')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON (test2 = test3 OR NOT EXISTS (test4))");

});

it('can join on exists subquery', function ()
{

  expect(
    (string) SQL::select()
    ->join('test1', fn (On $o) =>
      $o->onExists(SQL::subquery('test2'))
    )
  )
  ->toEqual("SELECT * JOIN test1 ON EXISTS (test2)");

});

it('can join multiple tables', function ()
{

  expect(
    (string) SQL::select()
    ->join(['test1', 'test2'])
  )
  ->toEqual("SELECT * JOIN test1 JOIN test2");

});

it('can join multiple tables using', function ()
{

  expect(
    (string) SQL::select()
    ->join([
      'test1' => 'test2',
      'test3' => [['test4', 'test5']],
    ])
  )
  ->toEqual(
    "SELECT * JOIN test1 USING (test2) JOIN test3 USING (test4, test5)"
  );

});

it('can join multiple tables on', function ()
{

  expect(
    (string) SQL::select()
    ->join([
      'test1' => ['test2', 'test3'],
      'test4' => ['test5', '<', 'test6'],
      'test7' => fn (On $o) => $o->on('test8', 'test9'),
    ])
  )
  ->toEqual(
    "SELECT * JOIN test1 ON test2 = test3 "
  . "JOIN test4 ON test5 < test6 "
  . "JOIN test7 ON test8 = test9"
  );

});

it('can left join using column', function ()
{

  expect(
    (string) SQL::select()
    ->leftJoin('test1', 'test2')
  )
  ->toEqual("SELECT * LEFT JOIN test1 USING (test2)");

});

it('can left join on equals', function ()
{

  expect(
    (string) SQL::select()
    ->leftJoin('test1', 'test2', 'test3')
  )
  ->toEqual("SELECT * LEFT JOIN test1 ON test2 = test3");

});

it('can left join on defined comparison', function ()
{

  expect(
    (string) SQL::select()
    ->leftJoin('test1', 'test2', '<', 'test3')
  )
  ->toEqual("SELECT * LEFT JOIN test1 ON test2 < test3");

});

it('can right join using column', function ()
{

  expect(
    (string) SQL::select()
    ->rightJoin('test1', 'test2')
  )
  ->toEqual("SELECT * RIGHT JOIN test1 USING (test2)");

});

it('can right join on equals', function ()
{

  expect(
    (string) SQL::select()
    ->rightJoin('test1', 'test2', 'test3')
  )
  ->toEqual("SELECT * RIGHT JOIN test1 ON test2 = test3");

});

it('can right join on defined comparison', function ()
{

  expect(
    (string) SQL::select()
    ->rightJoin('test1', 'test2', '<', 'test3')
  )
  ->toEqual("SELECT * RIGHT JOIN test1 ON test2 < test3");

});

it('can full join using column', function ()
{

  expect(
    (string) SQL::select()
    ->fullJoin('test1', 'test2')
  )
  ->toEqual("SELECT * FULL JOIN test1 USING (test2)");

});

it('can full join on equals', function ()
{

  expect(
    (string) SQL::select()
    ->fullJoin('test1', 'test2', 'test3')
  )
  ->toEqual("SELECT * FULL JOIN test1 ON test2 = test3");

});

it('can full join on defined comparison', function ()
{

  expect(
    (string) SQL::select()
    ->fullJoin('test1', 'test2', '<', 'test3')
  )
  ->toEqual("SELECT * FULL JOIN test1 ON test2 < test3");

});

it('can cross join using column', function ()
{

  expect(
    (string) SQL::select()
    ->crossJoin('test1', 'test2')
  )
  ->toEqual("SELECT * CROSS JOIN test1 USING (test2)");

});

it('can cross join on equals', function ()
{

  expect(
    (string) SQL::select()
    ->crossJoin('test1', 'test2', 'test3')
  )
  ->toEqual("SELECT * CROSS JOIN test1 ON test2 = test3");

});

it('can cross join on defined comparison', function ()
{

  expect(
    (string) SQL::select()
    ->crossJoin('test1', 'test2', '<', 'test3')
  )
  ->toEqual("SELECT * CROSS JOIN test1 ON test2 < test3");

});

it('can straight join using column', function ()
{

  expect(
    (string) SQL::select()
    ->straightJoin('test1', 'test2')
  )
  ->toEqual("SELECT * STRAIGHT_JOIN test1 USING (test2)");

});

it('can straight join on equals', function ()
{

  expect(
    (string) SQL::select()
    ->straightJoin('test1', 'test2', 'test3')
  )
  ->toEqual("SELECT * STRAIGHT_JOIN test1 ON test2 = test3");

});

it('can straight join on defined comparison', function ()
{

  expect(
    (string) SQL::select()
    ->straightJoin('test1', 'test2', '<', 'test3')
  )
  ->toEqual("SELECT * STRAIGHT_JOIN test1 ON test2 < test3");

});

it('can join on raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->join('test1', fn (On $o) => $o->onRaw('CONCAT(test2) = ?', 'test3'))
  )
  ->toEqual("SELECT * JOIN test1 ON CONCAT(test2) = ?");

  expect($stmt->bindings())
  ->toBe(["test3"]);

});

it('can join on not raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->join('test1', fn (On $o) => $o->onNotRaw('CONCAT(test2) = ?', 'test3'))
  )
  ->toEqual("SELECT * JOIN test1 ON NOT CONCAT(test2) = ?");

  expect($stmt->bindings())
  ->toBe(["test3"]);

});

it('can join or on raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->join('test1', fn (On $o) => $o->on("test2", "test3")
      ->orOnRaw('CONCAT(test4) = ?', 'test5')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON (test2 = test3 OR CONCAT(test4) = ?)");

  expect($stmt->bindings())
  ->toBe(["test5"]);

});

it('can join or on not raw', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->join('test1', fn (On $o) => $o->on("test2", "test3")
      ->orOnNotRaw('CONCAT(test4) = ?', 'test5')
    )
  )
  ->toEqual("SELECT * JOIN test1 ON (test2 = test3 OR NOT CONCAT(test4) = ?)");

  expect($stmt->bindings())
  ->toBe(["test5"]);

});