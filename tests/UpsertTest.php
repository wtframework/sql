<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;
use WTFramework\SQL\Upsert;

it('can do nothing', function ()
{

  expect((string) new Upsert)
  ->toEqual('DO NOTHING');

});

it('can do nothing with column', function ()
{

  expect(
    (string) (new Upsert)
    ->column('test')
  )
  ->toEqual('(test) DO NOTHING');

  expect(
    (string) (new Upsert)
    ->column(['test1', 'test2'])
  )
  ->toEqual('(test1, test2) DO NOTHING');

});

it('can do nothing with constraint', function ()
{

  expect(
    (string) (new Upsert)
    ->onConstraint('test')
  )
  ->toEqual('ON CONSTRAINT test DO NOTHING');

});

it('can do nothing with target where', function ()
{

  expect(
    (string) (new Upsert)
    ->targetWhere(SQL::where('test1', 'test2'))
  )
  ->toEqual('WHERE test1 = ? DO NOTHING');

});

it('can do update set', function ()
{

  expect(
    (string) (new Upsert)
    ->set('test', 1)
  )
  ->toEqual('DO UPDATE SET test = ?');

  expect(
    (string) $upsert = (new Upsert)
    ->set([
      'test1' => 1,
      'test2' => 2,
    ])
  )
  ->toEqual('DO UPDATE SET test1 = ?, test2 = ?');

  expect($upsert->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can do update set with where', function ()
{

  expect(
    (string) $upsert = (new Upsert)
    ->set('test1', 1)
    ->where('test2', 2)
  )
  ->toEqual('DO UPDATE SET test1 = ? WHERE test2 = ?');

  expect($upsert->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});