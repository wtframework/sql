<?php

declare(strict_types=1);

use WTFramework\SQL\Statements\Drop;

it('can drop', function ()
{

  expect((string) new Drop)
  ->toBe("DROP TABLE");

  expect(
    (string) (new Drop)
    ->setStatement('a', 'b')
    ->explain()
    ->temporary()
    ->ifExists()
    ->table('t1')
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
  . "DROP "
  . "TEMPORARY "
  . "TABLE "
  . "IF EXISTS "
  . "t1 "
  . "CASCADE "
  . "WAIT 1 "
  . "ELSE test"
  );

});