<?php

declare(strict_types=1);

use WTFramework\SQL\Simple\Statements\Truncate;
use WTFramework\SQL\Statement;

it('can truncate', function ()
{

  expect(new Truncate)
  ->toBeInstanceOf(Statement::class);

  expect((string) new Truncate)
  ->toBe("TRUNCATE TABLE");

  expect(
    (string) (new Truncate)
    ->table('t1')
  )
  ->toBe("TRUNCATE TABLE t1");

});