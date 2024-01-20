<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can on duplicate key insert', function ()
{

  expect(
    (string) SQL::insert()
    ->onDuplicateKeyUpdate('test', 1)
  )
  ->toEqual("INSERT VALUES () ON DUPLICATE KEY UPDATE test = 1");

});

it('can on duplicate key insert multiple values', function ()
{

  expect(
    (string) SQL::insert()
    ->onDuplicateKeyUpdate([
      'test1' => 1,
      'test2' => 2,
    ])
  )
  ->toEqual("INSERT VALUES () ON DUPLICATE KEY UPDATE test1 = 1, test2 = 2");

});

it('can on duplicate key insert bound value', function ()
{

  expect(
    (string) $stmt = SQL::insert()
    ->onDuplicateKeyUpdate('test1', 'test2')
  )
  ->toEqual("INSERT VALUES () ON DUPLICATE KEY UPDATE test1 = ?");

  expect($stmt->bindings())
  ->toEqual(['test2']);

});

it('can on duplicate key insert multiple columns', function ()
{

  expect(
    (string) SQL::insert()
    ->onDuplicateKeyUpdate(['test1', 'test2'], 1)
  )
  ->toEqual("INSERT VALUES () ON DUPLICATE KEY UPDATE (test1, test2) = 1");

});