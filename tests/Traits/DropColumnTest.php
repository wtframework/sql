<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can drop column', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumn('test1')
  )
  ->toEqual("ALTER TABLE DROP COLUMN test1");

});

it('can drop multiple columns', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumn(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP COLUMN test1, DROP COLUMN test2"
  );

});

it('can drop column if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumnIfExists('test1')
  )
  ->toEqual("ALTER TABLE DROP COLUMN IF EXISTS test1");

});

it('can drop multiple columns if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumnIfExists(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP COLUMN IF EXISTS test1, DROP COLUMN IF EXISTS test2"
  );

});

it('can drop column cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumnCascade('test1')
  )
  ->toEqual("ALTER TABLE DROP COLUMN test1 CASCADE");

});

it('can drop multiple columns cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumnCascade(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP COLUMN test1 CASCADE, DROP COLUMN test2 CASCADE"
  );

});

it('can drop column if exists cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumnIfExistsCascade('test1')
  )
  ->toEqual("ALTER TABLE DROP COLUMN IF EXISTS test1 CASCADE");

});

it('can drop multiple columns if exists cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropColumnIfExistsCascade(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP COLUMN IF EXISTS test1 CASCADE, "
  . "DROP COLUMN IF EXISTS test2 CASCADE"
  );

});