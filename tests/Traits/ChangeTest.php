<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can change column', function ()
{

  expect(
    (string) SQL::alter()
    ->change('test1', 'test2')
  )
  ->toEqual("ALTER TABLE CHANGE COLUMN test1 test2");

});

it('can change column if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->changeIfExists('test1', 'test2')
  )
  ->toEqual("ALTER TABLE CHANGE COLUMN IF EXISTS test1 test2");

});

it('can change multiple columns', function ()
{

  expect(
    (string) SQL::alter()
    ->change([
      'test1' => 'test2',
      'test3' => 'test4',
    ])
  )
  ->toEqual(
    "ALTER TABLE CHANGE COLUMN test1 test2, CHANGE COLUMN test3 test4"
  );

});

it('can change multiple columns if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->changeIfExists([
      'test1' => 'test2',
      'test3' => 'test4',
    ])
  )
  ->toEqual(
    "ALTER TABLE CHANGE COLUMN IF EXISTS test1 test2, "
  . "CHANGE COLUMN IF EXISTS test3 test4"
  );

});

it('can change bound value column', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->change('test', SQL::bind('test'))
  )
  ->toEqual("ALTER TABLE CHANGE COLUMN test ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});