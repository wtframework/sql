<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can create union', function ()
{

  expect(
    (string) SQL::create()
    ->union('test')
  )
  ->toEqual("CREATE TABLE UNION (test)");

});

it('can create multiple unions', function ()
{

  expect(
    (string) SQL::create()
    ->union(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE UNION (test1, test2)");

});