<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Simple\Statements\Update;
use WTFramework\SQL\Statement;

it('can update', function ()
{

  expect(new Update)
  ->toBeInstanceOf(Statement::class);

  expect((string) new Update)
  ->toBe("UPDATE");

  expect(
    (string) (new Update)
    ->ignore()
    ->top(5)
    ->table('t1')
    ->from('t2')
    ->join('t3')
    ->set('c1', 1)
    ->where('c2', 2)
    ->orderBy('c3')
    ->limit(10)
    ->offset(15)
  )
  ->toBe("UPDATE IGNORE t1 FROM t2 JOIN t3 SET c1 = 1 WHERE c2 = 2 ORDER BY c3 LIMIT 10 OFFSET 15");

  expect(
    (string) (new Update)
    ->use(Grammar::TSQL)
    ->orFail()
    ->top(5)
    ->table('t1')
    ->limit(10)
  )
  ->toBe("UPDATE OR FAIL TOP (5) t1");

  expect(
    (string) (new Update)
    ->orReplace()
    ->table('t1')
  )
  ->toBe("UPDATE OR REPLACE t1");

});