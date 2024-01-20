<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Window;
use WTFramework\SQL\SQL;

it('can partition by column', function ()
{

  expect(
    (string) (new Window)
    ->partitionBy('test')
  )
  ->toEqual("PARTITION BY test");

});

it('can partition by multiple columns', function ()
{

  expect(
    (string) (new Window)
    ->partitionBy(['test1', 'test2'])
  )
  ->toEqual("PARTITION BY test1, test2");

});

it('can partition by bound value', function ()
{

  expect(
    (string) $stmt = (new Window)
    ->partitionBy(SQL::bind('test'))
  )
  ->toEqual("PARTITION BY ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});