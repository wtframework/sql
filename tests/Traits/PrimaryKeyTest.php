<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set primary key', function ()
{

  expect(
    (string) SQL::create()
    ->primaryKey('test')
  )
  ->toEqual("CREATE TABLE (PRIMARY KEY (test))");

});

it('can set multiple column primary key', function ()
{

  expect(
    (string) SQL::create()
    ->primaryKey(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE (PRIMARY KEY (test1, test2))");

});