<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set insert method no', function ()
{

  expect(
    (string) SQL::create()
    ->insertMethodNo()
  )
  ->toEqual("CREATE TABLE INSERT_METHOD = NO");

});

it('can set insert method first', function ()
{

  expect(
    (string) SQL::create()
    ->insertMethodFirst()
  )
  ->toEqual("CREATE TABLE INSERT_METHOD = FIRST");

});

it('can set insert method last', function ()
{

  expect(
    (string) SQL::create()
    ->insertMethodLast()
  )
  ->toEqual("CREATE TABLE INSERT_METHOD = LAST");

});