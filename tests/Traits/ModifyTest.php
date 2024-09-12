<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Column;
use WTFramework\SQL\SQL;

it('can modify column', function ()
{

  $stmt = SQL::alter();

  expect($column = $stmt->modify('test'))
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual("test");

  expect((string) $stmt)
  ->toEqual("ALTER TABLE MODIFY COLUMN test");

});