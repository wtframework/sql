<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select sql cache', function ()
{

  expect(
    (string) SQL::select()
    ->sqlCache()
  )
  ->toEqual('SELECT SQL_CACHE *');

});

it('can select sql no cache', function ()
{

  expect(
    (string) SQL::select()
    ->sqlNoCache()
  )
  ->toEqual('SELECT SQL_NO_CACHE *');

});