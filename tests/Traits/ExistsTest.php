<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get exists subquery', function ()
{

  expect(
    (string) SQL::subquery('test')
    ->exists()
  )
  ->toEqual('EXISTS (test)');

});

it('can get not exists subquery', function ()
{

  expect(
    (string) SQL::subquery('test')
    ->notExists()
  )
  ->toEqual('NOT EXISTS (test)');

});