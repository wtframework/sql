<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Simple\Statements\Insert;
use WTFramework\SQL\Statement;

it('can insert', function ()
{

  expect(new Insert)
  ->toBeInstanceOf(Statement::class);

  expect((string) new Insert)
  ->toBe("INSERT VALUES ()");

  expect(
    (string) (new Insert)
    ->ignore()
    ->top(5)
    ->into('t1')
    ->column('c1')
    ->values([1])
    ->onDuplicateKeyUpdate('c2', 2)
    ->onConflict("DO NOTHING")
  )
  ->toBe("INSERT IGNORE INTO t1 (c1) VALUES (1) ON DUPLICATE KEY UPDATE c2 = 2 ON CONFLICT DO NOTHING");

  expect(
    (string) (new Insert)
    ->use(Grammar::TSQL)
    ->orFail()
    ->top(5)
    ->into('t1')
    ->column('c1')
    ->set('c2', 2)
    ->onDuplicateKeyUpdate('c3', 3)
  )
  ->toBe("INSERT OR FAIL TOP (5) INTO t1 (c1) SET c2 = 2 ON DUPLICATE KEY UPDATE c3 = 3");

  expect(
    (string) (new Insert)
    ->orReplace()
    ->into('t1')
    ->column('c1')
    ->select('SELECT')
    ->onDuplicateKeyUpdate('c2', 2)
  )
  ->toBe("INSERT OR REPLACE INTO t1 (c1) SELECT ON DUPLICATE KEY UPDATE c2 = 2");

});