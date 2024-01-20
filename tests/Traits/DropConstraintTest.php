<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can drop constraint', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraint('test1')
  )
  ->toEqual("ALTER TABLE DROP CONSTRAINT test1");

});

it('can drop multiple constraints', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraint(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP CONSTRAINT test1, DROP CONSTRAINT test2"
  );

});

it('can drop constraint if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraintIfExists('test1')
  )
  ->toEqual("ALTER TABLE DROP CONSTRAINT IF EXISTS test1");

});

it('can drop multiple constraints if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraintIfExists(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP CONSTRAINT IF EXISTS test1, DROP CONSTRAINT IF EXISTS test2"
  );

});

it('can drop constraint cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraintCascade('test1')
  )
  ->toEqual("ALTER TABLE DROP CONSTRAINT test1 CASCADE");

});

it('can drop multiple constraints cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraintCascade(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP CONSTRAINT test1 CASCADE, DROP CONSTRAINT test2 CASCADE"
  );

});

it('can drop constraint if exists cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraintIfExistsCascade('test1')
  )
  ->toEqual("ALTER TABLE DROP CONSTRAINT IF EXISTS test1 CASCADE");

});

it('can drop multiple constraints if exists cascade', function ()
{

  expect(
    (string) SQL::alter()
    ->dropConstraintIfExistsCascade(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP CONSTRAINT IF EXISTS test1 CASCADE, "
  . "DROP CONSTRAINT IF EXISTS test2 CASCADE"
  );

});