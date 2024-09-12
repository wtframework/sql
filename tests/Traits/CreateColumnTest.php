<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Column;
use WTFramework\SQL\SQL;

it('can create column', function ()
{

  $stmt = SQL::create();

  expect($column = $stmt->column('test'))
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual("test");

  expect((string) $stmt)
  ->toEqual("CREATE TABLE (test)");

});