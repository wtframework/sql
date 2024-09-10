<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\SQL;
use WTFramework\SQL\Statements\Update;

it('can update', function ()
{

  expect((string) new Update)
  ->toBe("UPDATE");

  expect(
    (string) $stmt = (new Update)
    ->setStatement('a', 'b')
    ->explain()
    ->with('cte')
    ->lowPriority()
    ->ignore()
    ->table('t1')
    ->from('t1')
    ->join('t1')
    ->forPortionOf('period', 'from', SQL::bind('to'))
    ->set('c1', 1)
    ->where('c1', 1)
    ->returning()
    ->orderBy('c1')
    ->limit(1)
    ->offset(1)
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toBe(
    "IF test "
  . "SET STATEMENT a = b FOR "
  . "EXPLAIN "
  . "WITH cte "
  . "UPDATE "
  . "LOW_PRIORITY "
  . "IGNORE "
  . "t1 "
  . "FROM t1 "
  . "JOIN t1 "
  . "FOR PORTION OF period FROM from TO ? "
  . "SET c1 = 1 "
  . "WHERE c1 = 1 "
  . "RETURNING * "
  . "ORDER BY c1 "
  . "LIMIT 1 "
  . "OFFSET 1 "
  . "ELSE test"
  );

  expect($stmt->bindings())
  ->toBe(['to']);

  expect((string) (new Update)->use(Grammar::TSQL)->top(1))
  ->toBe("UPDATE TOP (1)");

  expect((string) (new Update)->orFail())
  ->toBe("UPDATE OR FAIL");

  expect((string) (new Update)->orReplace())
  ->toBe("UPDATE OR REPLACE");

  expect((string) (new Update)->whereCurrentOf('cursor'))
  ->toBe("UPDATE WHERE CURRENT OF cursor");

});

it('can update with table name', function ()
{

  expect((string) new Update('test'))
  ->toBe("UPDATE test");

});