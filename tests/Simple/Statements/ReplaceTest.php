<?php

declare(strict_types=1);

use WTFramework\SQL\Simple\Statements\Replace;
use WTFramework\SQL\Statement;

it('can replace', function ()
{

  expect(new Replace)
  ->toBeInstanceOf(Statement::class);

  expect((string) new Replace)
  ->toBe("REPLACE VALUES ()");

  expect(
    (string) (new Replace)
    ->into('t1')
    ->column('c1')
    ->values([1])
  )
  ->toBe("REPLACE INTO t1 (c1) VALUES (1)");

  expect(
    (string) (new Replace)
    ->column('c1')
    ->set('c2', 2)
  )
  ->toBe("REPLACE (c1) SET c2 = 2");

  expect(
    (string) (new Replace)
    ->column('c1')
    ->select('SELECT')
  )
  ->toBe("REPLACE (c1) SELECT");

});