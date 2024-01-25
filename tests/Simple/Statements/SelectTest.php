<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\Simple\Statements\Select;
use WTFramework\SQL\Statement;

it('can select', function ()
{

  expect(new Select)
  ->toBeInstanceOf(Statement::class);

  expect((string) new Select)
  ->toBe("SELECT *");

  expect(
    (string) (new Select)
    ->distinct()
    ->top(5)
    ->column('c1')
    ->from('t2')
    ->join('t3')
    ->where('c2', 2)
    ->groupBy('c3')
    ->having('c4', 4)
    ->union('SELECT')
    ->orderBy('c5')
    ->limit(10)
    ->offset(15)
  )
  ->toBe("SELECT DISTINCT c1 FROM t2 JOIN t3 WHERE c2 = 2 GROUP BY c3 HAVING c4 = 4 UNION SELECT ORDER BY c5 LIMIT 10 OFFSET 15");

  expect(
    (string) (new Select)
    ->use(Grammar::TSQL)
    ->distinct()
    ->top(5)
    ->column('c1')
    ->limit(10)
  )
  ->toBe("SELECT DISTINCT TOP (5) c1");

  expect(
    (string) (new Select)
    ->orderBy('c1')
    ->offsetRows(5)
    ->fetchRows(10)
  )
  ->toBe("SELECT * ORDER BY c1 OFFSET 5 ROWS FETCH NEXT 10 ROWS ONLY");

});

it('can convert to subquery', function ()
{

  expect($subquery = (new Select)->toSubquery())
  ->toBeInstanceOf(Subquery::class);

  expect((string) $subquery)
  ->toBe("(SELECT *)");

});