<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add index', function ()
{

  expect(
    (string) SQL::alter()
    ->addIndex('test')
  )
  ->toEqual("ALTER TABLE ADD test");

});

it('can add multiple indexes', function ()
{

  expect(
    (string) SQL::alter()
    ->addIndex(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE ADD test1, ADD test2");

});

it('can add bound value index', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->addIndex(SQL::bind('test'))
  )
  ->toEqual("ALTER TABLE ADD ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});