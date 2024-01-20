<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can do nothing', function ()
{

  expect((string) SQL::upsert())
  ->toEqual('DO NOTHING');

});

it('can do update set', function ()
{

  expect(
    (string) $upsert = SQL::upsert()
    ->column('test')
    ->whereIndex('test')
    ->set('test', 'test')
    ->where('test', 'test')
  )
  ->toEqual('(test) WHERE test DO UPDATE SET test = ? WHERE test = ?');

  expect($upsert->bindings())
  ->toEqual(['test', 'test']);

});

it('can do nothing on constraint', function ()
{

  expect(
    (string) SQL::upsert()
    ->onConstraint('test1')
    ->whereIndex('test2')
  )
  ->toEqual('ON CONSTRAINT test1 WHERE test2 DO NOTHING');

});