<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add column', function ()
{

  expect(
    (string) SQL::alter()
    ->addColumn('test')
  )
  ->toEqual("ALTER TABLE ADD test");

});

it('can add multiple columns', function ()
{

  expect(
    (string) SQL::alter()
    ->addColumn(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE ADD test1, ADD test2");

});

it('can add bound value column', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->addColumn(SQL::bind('test'))
  )
  ->toEqual("ALTER TABLE ADD ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});