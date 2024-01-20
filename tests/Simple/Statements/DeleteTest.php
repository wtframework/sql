<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Simple\Statements\Delete;
use WTFramework\SQL\Statement;

it('can delete', function ()
{

  expect(new Delete)
  ->toBeInstanceOf(Statement::class);

  expect((string) new Delete)
  ->toBe("DELETE");

  expect(
    (string) (new Delete)
    ->ignore()
    ->top(5)
    ->table('t1')
    ->from('t2')
    ->join('t3')
    ->using('t4')
    ->where('c1', 1)
    ->orderBy('c2')
    ->limit(10)
    ->offset(15)
  )
  ->toBe("DELETE IGNORE t1 FROM t2 JOIN t3 USING t4 WHERE c1 = 1 ORDER BY c2 LIMIT 10 OFFSET 15");

  expect(
    (string) (new Delete)
    ->use(Grammar::TSQL)
    ->ignore()
    ->top(5)
    ->table('t1')
    ->limit(10)
  )
  ->toBe("DELETE IGNORE TOP (5) t1");

});