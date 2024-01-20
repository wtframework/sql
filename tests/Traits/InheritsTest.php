<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can inherit table', function ()
{

  expect(
    (string) SQL::create()
    ->inherits('test')
  )
  ->toEqual("CREATE TABLE INHERITS (test)");

});

it('can inherit multiple tables', function ()
{

  expect(
    (string) SQL::create()
    ->inherits(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE INHERITS (test1, test2)");

});