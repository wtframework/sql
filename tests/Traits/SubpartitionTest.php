<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Subpartition;
use WTFramework\SQL\SQL;

it('can create subpartition', function ()
{

  $partition = SQL::partition('test1');

  expect($subpartition = $partition->subpartition('test2'))
  ->toBeInstanceOf(Subpartition::class);

  expect((string) $subpartition)
  ->toEqual("SUBPARTITION test2");

  expect((string) $partition)
  ->toEqual("PARTITION test1 (SUBPARTITION test2)");

});