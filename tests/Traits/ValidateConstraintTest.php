<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can validate constraint', function ()
{

  expect(
    (string) SQL::alter()
    ->validateConstraint('test')
  )
  ->toEqual("ALTER TABLE VALIDATE CONSTRAINT test");

});

it('can validate multiple constraints', function ()
{

  expect(
    (string) SQL::alter()
    ->validateConstraint(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE VALIDATE CONSTRAINT test1, VALIDATE CONSTRAINT test2");

});