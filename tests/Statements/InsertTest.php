<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Statements\Insert;

it('can insert', function ()
{

  expect((string) new Insert)
  ->toBe("INSERT VALUES ()");

  expect(
    (string) (new Insert)
    ->setStatement('a', 'b')
    ->explain()
    ->with('cte')
    ->lowPriority()
    ->ignore()
    ->into('t1')
    ->column('c1')
    ->overridingSystemValue()
    ->values([1])
    ->rowAlias('a', 'b')
    ->onDuplicateKeyUpdate('c1', 1)
    ->onConflict('DO NOTHING')
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
  . "INSERT "
  . "LOW_PRIORITY "
  . "IGNORE "
  . "INTO t1 "
  . "(c1) "
  . "OVERRIDING SYSTEM VALUE "
  . "VALUES (1) "
  . "AS a (b) "
  . "ON DUPLICATE KEY UPDATE c1 = 1 "
  . "ON CONFLICT DO NOTHING "
  . "RETURNING * "
  . "ELSE test"
  );

  expect((string) (new Insert)->delayed())
  ->toBe("INSERT DELAYED VALUES ()");

  expect((string) (new Insert)->highPriority())
  ->toBe("INSERT HIGH_PRIORITY VALUES ()");

  expect((string) (new Insert)->orFail())
  ->toBe("INSERT OR FAIL VALUES ()");

  expect((string) (new Insert)->orReplace())
  ->toBe("INSERT OR REPLACE VALUES ()");

  expect((string) (new Insert)->set('c1', 1))
  ->toBe("INSERT SET c1 = 1");

  expect((string) (new Insert)->select("SELECT"))
  ->toBe("INSERT SELECT");

  expect((string) (new Insert)->use(Grammar::TSQL)->top(1))
  ->toBe("INSERT TOP (1) DEFAULT VALUES");

});