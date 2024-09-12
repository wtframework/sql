<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Partition;
use WTFramework\SQL\SQL;

it('can create partition', function ()
{

  $stmt = SQL::create();

  expect($partition = $stmt->partition('test'))
  ->toBeInstanceOf(Partition::class);

  expect((string) $partition)
  ->toEqual("PARTITION test");

  expect((string) $stmt)
  ->toEqual("CREATE TABLE (PARTITION test)");

});