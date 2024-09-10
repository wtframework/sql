<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Statements\Select;

it('can select', function ()
{

  expect((string) new Select)
  ->toBe("SELECT *");

  expect(
    (string) (new Select)
    ->setStatement('a', 'b')
    ->explain()
    ->with('cte')
    ->distinct()
    ->highPriority()
    ->straightJoinAll()
    ->sqlSmallResult()
    ->sqlBigResult()
    ->sqlBufferResult()
    ->sqlCache()
    ->sqlCalcFoundRows()
    ->column('c1')
    ->into('t1')
    ->from('t1')
    ->join('t1')
    ->where('c1', 1)
    ->groupBy('c1')
    ->having('c1', 1)
    ->window('w')
    ->union('SELECT')
    ->orderBy('c1')
    ->limit(1)
    ->offset(1)
    ->rowsExamined(1)
    ->procedureAnalyse()
    ->forUpdate()
    ->forNoKeyUpdate()
    ->forShare()
    ->forKeyShare()
    ->intoOutfile("'test'.txt")
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toBe(
    "IF test "
  . "SET STATEMENT a = b FOR "
  . "EXPLAIN "
  . "WITH cte "
  . "SELECT "
  . "DISTINCT "
  . "HIGH_PRIORITY "
  . "STRAIGHT_JOIN "
  . "SQL_SMALL_RESULT "
  . "SQL_BIG_RESULT "
  . "SQL_BUFFER_RESULT "
  . "SQL_CACHE "
  . "SQL_CALC_FOUND_ROWS "
  . "c1 "
  . "INTO t1 "
  . "FROM t1 "
  . "JOIN t1 "
  . "WHERE c1 = 1 "
  . "GROUP BY c1 "
  . "HAVING c1 = 1 "
  . "WINDOW w AS () "
  . "UNION SELECT "
  . "ORDER BY c1 "
  . "LIMIT 1 "
  . "OFFSET 1 "
  . "ROWS EXAMINED 1 "
  . "PROCEDURE ANALYSE () "
  . "FOR UPDATE "
  . "FOR NO KEY UPDATE "
  . "FOR SHARE "
  . "FOR KEY SHARE "
  . "INTO OUTFILE '''test''.txt' "
  . "ELSE test"
  );

  expect((string) (new Select)->offsetRows(1)->fetchRows(1))
  ->toBe("SELECT * OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY");

  expect((string) (new Select)->use(Grammar::TSQL)->top(1))
  ->toBe("SELECT TOP (1) *");

  expect((string) (new Select)->whereCurrentOf('cursor'))
  ->toBe("SELECT * WHERE CURRENT OF cursor");

  expect((string) (new Select)->lockInShareMode())
  ->toBe("SELECT * LOCK IN SHARE MODE");

  expect((string) (new Select)->intoDumpfile("'test'.txt"))
  ->toBe("SELECT * INTO DUMPFILE '''test''.txt'");

  expect((string) (new Select)->intoVar('test'))
  ->toEqual("SELECT * INTO @test");

});

it('can select with table name', function ()
{

  expect((string) new Select('test'))
  ->toBe("SELECT * FROM test");

});