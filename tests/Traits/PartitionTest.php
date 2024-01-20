<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can partition', function ()
{

  expect(
    (string) SQL::create()
    ->partition('test')
  )
  ->toEqual("CREATE TABLE (test)");

});

it('can partition multiple', function ()
{

  expect(
    (string) SQL::create()
    ->partition(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE (test1, test2)");

});