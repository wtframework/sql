<?php

declare(strict_types=1);

use WTFramework\SQL\Statements\Replace;

it('can replace', function ()
{

  expect((string) new Replace)
  ->toBe("REPLACE VALUES ()");

  expect(
    (string) (new Replace)
    ->setStatement('a', 'b')
    ->explain()
    ->with('cte')
    ->into('t1')
    ->lowPriority()
    ->column('c1')
    ->values([1])
    ->returning()
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toBe(
    "IF test "
  . "SET STATEMENT a = b FOR "
  . "EXPLAIN "
  . "WITH cte "
  . "REPLACE "
  . "LOW_PRIORITY "
  . "INTO t1 "
  . "(c1) "
  . "VALUES (1) "
  . "RETURNING * "
  . "ELSE test"
  );

  expect((string) (new Replace)->delayed())
  ->toBe("REPLACE DELAYED VALUES ()");

  expect((string) (new Replace)->set('c1', 1))
  ->toBe("REPLACE SET c1 = 1");

  expect((string) (new Replace)->select("SELECT"))
  ->toBe("REPLACE SELECT");

});