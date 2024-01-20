<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can alter constraint enforced', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintEnforced('test')
  )
  ->toEqual("ALTER TABLE ALTER CONSTRAINT test ENFORCED");

});

it('can alter constraint not enforced', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintNotEnforced('test')
  )
  ->toEqual("ALTER TABLE ALTER CONSTRAINT test NOT ENFORCED");

});

it('can alter constraint deferrable', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintDeferrable('test')
  )
  ->toEqual("ALTER TABLE ALTER CONSTRAINT test DEFERRABLE");

});

it('can alter constraint deferrable initially deferred', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintDeferrableDeferred('test')
  )
  ->toEqual(
    "ALTER TABLE ALTER CONSTRAINT test DEFERRABLE INITIALLY DEFERRED"
  );

});

it('can alter constraint deferrable initially immediate', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintDeferrableImmediate('test')
  )
  ->toEqual(
    "ALTER TABLE ALTER CONSTRAINT test DEFERRABLE INITIALLY IMMEDIATE"
  );

});

it('can alter constraint not deferrable', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintNotDeferrable('test')
  )
  ->toEqual("ALTER TABLE ALTER CONSTRAINT test NOT DEFERRABLE");

});

it('can alter constraint not deferrable initially deferred', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintNotDeferrableDeferred('test')
  )
  ->toEqual(
    "ALTER TABLE ALTER CONSTRAINT test NOT DEFERRABLE INITIALLY DEFERRED"
  );

});

it('can alter constraint not deferrable initially immediate', function ()
{

  expect(
    (string) SQL::alter()
    ->constraintNotDeferrableImmediate('test')
  )
  ->toEqual(
    "ALTER TABLE ALTER CONSTRAINT test NOT DEFERRABLE INITIALLY IMMEDIATE"
  );

});