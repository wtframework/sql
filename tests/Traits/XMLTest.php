<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set xml', function ()
{

  expect(
    (string) SQL::createIndex('test')
    ->xml()
  )
  ->toEqual("CREATE XML INDEX test");

});

it('can set primary xml', function ()
{

  expect(
    (string) SQL::createIndex('test')
    ->primaryXML()
  )
  ->toEqual("CREATE PRIMARY XML INDEX test");

});