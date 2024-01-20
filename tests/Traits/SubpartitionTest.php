<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add subpartition', function ()
{

  expect(
    (string) SQL::partition('test')
    ->subpartition('test')
  )
  ->toEqual("PARTITION test (test)");

});

it('can add multiple subpartitions', function ()
{

  expect(
    (string) SQL::partition('test')
    ->subpartition(['test1', 'test2'])
  )
  ->toEqual("PARTITION test (test1, test2)");

});