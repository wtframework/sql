<?php

declare(strict_types=1);

use WTFramework\SQL\Statements\DropIndex;

it('can drop index', function ()
{

  expect((string) new DropIndex('i0'))
  ->toBe("DROP INDEX i0");

  expect(
    (string) (new DropIndex('i0'))
    ->explain()
    ->concurrently()
    ->ifExists()
    ->index('i1')
    ->on('t1')
    ->algorithmCopy()
    ->lockDefault()
    ->cascade()
    ->wait(1)
    ->with('a')
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toBe(
    "IF test "
  . "EXPLAIN "
  . "DROP INDEX "
  . "CONCURRENTLY "
  . "IF EXISTS "
  . "i0, i1 "
  . "ON t1 "
  . "ALGORITHM COPY "
  . "LOCK DEFAULT "
  . "CASCADE "
  . "WAIT 1 "
  . "WITH (a) "
  . "ELSE test"
  );

});