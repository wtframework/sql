<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;
use WTFramework\SQL\Services\Where;

it('can on conflict with index predicate', function ()
{

  expect(
    (string) SQL::upsert()
    ->whereIndex('test')
  )
  ->toEqual('WHERE test DO NOTHING');

});

it('can on conflict with multiple index predicates', function ()
{

  expect(
    (string) SQL::upsert()
    ->whereIndex(['test1', 'test2'])
  )
  ->toEqual('WHERE test1 AND test2 DO NOTHING');

});

it('can on conflict with bound index predicate', function ()
{

  expect(
    (string) $stmt = SQL::upsert()
    ->whereIndex(SQL::bind('test'))
  )
  ->toEqual('WHERE ? DO NOTHING');

  expect($stmt->bindings())
  ->toEqual(['test']);

});

it('can on conflict with index predicate closure', function ()
{

  expect(
    (string) SQL::upsert()
    ->whereIndex(fn (Where $w) => $w->where('test', 1))
  )
  ->toEqual('WHERE test = 1 DO NOTHING');

});