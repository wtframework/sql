<?php

declare(strict_types=1);

use WTFramework\SQL\Statements\Truncate;

it('can truncate', function ()
{

  expect((string) new Truncate)
  ->toBe("TRUNCATE TABLE");

  expect(
    (string) (new Truncate)
    ->setStatement('a', 'b')
    ->explain()
    ->only()
    ->table('t1')
    ->restartIdentity()
    ->cascade()
    ->wait(1)
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toBe(
    "IF test "
  . "SET STATEMENT a = b FOR "
  . "EXPLAIN "
  . "TRUNCATE TABLE "
  . "ONLY "
  . "t1 "
  . "RESTART IDENTITY "
  . "CASCADE "
  . "WAIT 1 "
  . "ELSE test"
  );

});