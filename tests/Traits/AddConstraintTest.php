<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add constraint', function ()
{

  expect(
    (string) SQL::alter()
    ->addConstraint('test')
  )
  ->toEqual("ALTER TABLE ADD CONSTRAINT test");

});

it('can add multiple constraints', function ()
{

  expect(
    (string) SQL::alter()
    ->addConstraint(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE ADD CONSTRAINT test1, ADD CONSTRAINT test2");

});

it('can add bound value constraint', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->addConstraint(SQL::bind('test'))
  )
  ->toEqual("ALTER TABLE ADD CONSTRAINT ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});