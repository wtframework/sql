<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set row alias', function ()
{

  expect(
    (string) SQL::insert()
    ->rowAlias('test')
  )
  ->toEqual('INSERT VALUES () AS test');

});

it('can set column alias', function ()
{

  expect(
    (string) SQL::insert()
    ->rowAlias('test1', 'test2')
  )
  ->toEqual('INSERT VALUES () AS test1 (test2)');

});

it('can set multiple column aliases', function ()
{

  expect(
    (string) SQL::insert()
    ->rowAlias('test1', ['test2', 'test3'])
  )
  ->toEqual('INSERT VALUES () AS test1 (test2, test3)');

});