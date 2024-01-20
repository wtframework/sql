<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get table indexed by', function ()
{

  expect(
    (string) SQL::table('t1')
    ->indexedBy('test')
  )
  ->toEqual('t1 INDEXED BY test');

});

it('can get table not indexed', function ()
{

  expect(
    (string) SQL::table('test')
    ->notIndexed()
  )
  ->toEqual('test NOT INDEXED');

});