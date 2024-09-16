<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Column;
use WTFramework\SQL\SQL;

it('can add column', function ()
{

  $stmt = SQL::alter();

  expect($column = $stmt->addColumn('test'))
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual("test");

  expect((string) $stmt)
  ->toEqual("ALTER TABLE ADD test");

});