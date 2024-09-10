<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\SQL;
use WTFramework\SQL\Statements\Delete;

it('can delete', function ()
{

  expect((string) new Delete())
  ->toBe("DELETE");

  expect(
    (string) $stmt = (new Delete)
    ->setStatement('a', 'b')
    ->explain()
    ->with('cte')
    ->lowPriority()
    ->quick()
    ->ignore()
    ->history()
    ->table('t1')
    ->from('t1')
    ->join('t1')
    ->using('t1')
    ->forPortionOf('period', 'from', SQL::bind('to'))
    ->beforeSystemTime('time')
    ->where('c1', 1)
    ->orderBy('c1')
    ->limit(1)
    ->offset(1)
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
  . "DELETE "
  . "LOW_PRIORITY "
  . "QUICK "
  . "IGNORE "
  . "HISTORY "
  . "t1 "
  . "FROM t1 "
  . "JOIN t1 "
  . "USING t1 "
  . "FOR PORTION OF period FROM from TO ? "
  . "BEFORE SYSTEM_TIME ? "
  . "WHERE c1 = 1 "
  . "ORDER BY c1 "
  . "LIMIT 1 "
  . "OFFSET 1 "
  . "RETURNING * "
  . "ELSE test"
  );

  expect($stmt->bindings())
  ->toBe(['to', 'time']);

  expect((string) (new Delete)->use(Grammar::TSQL)->top(1))
  ->toBe("DELETE TOP (1)");

  expect(
    (string) (new Delete)
    ->use(Grammar::SQLite)
    ->whereCurrentOf('cursor')
    ->returning()
    ->orderBy('c1')
  )
  ->toBe("DELETE WHERE CURRENT OF cursor RETURNING * ORDER BY c1");

});

it('can delete with table name', function ()
{

  expect((string) new Delete('test'))
  ->toBe("DELETE FROM test");

});