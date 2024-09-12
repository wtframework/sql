<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Column;
use WTFramework\SQL\SQL;

it('can change column', function ()
{

  $stmt = SQL::alter();

  expect($column = $stmt->change('test1', 'test2'))
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual("test2");

  expect((string) $stmt)
  ->toEqual("ALTER TABLE CHANGE COLUMN test1 test2");

});