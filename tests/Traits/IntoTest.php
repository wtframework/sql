<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select into', function ()
{

  expect(
    (string) SQL::select()
    ->into('t1')
  )
  ->toEqual("SELECT * INTO t1");

});

it('can select into with alias', function ()
{

  expect(
    (string) SQL::select()
    ->into(['t2' => 't1'])
  )
  ->toEqual("SELECT * INTO t1 AS t2");

});