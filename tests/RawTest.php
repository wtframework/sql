<?php

declare(strict_types=1);

use WTFramework\SQL\Raw;

it('can get', function ()
{

  expect((string) new Raw(string: 'COUNT(*)'))
  ->toEqual('COUNT(*)');

});

it('can get with binding', function ()
{

  expect((string) $raw = new Raw(
    'user_id = ?',
    1
  ))
  ->toEqual('user_id = ?');

  expect($raw->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

  expect((string) $raw = new Raw(
    'user_id IN (?, ?)',
    [1, 2]
  ))
  ->toEqual('user_id IN (?, ?)');

  expect($raw->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});