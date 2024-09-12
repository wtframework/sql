<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Constraint;
use WTFramework\SQL\SQL;

it('can add constraint', function ()
{

  $stmt = SQL::alter();

  expect($constraint = $stmt->addConstraint('test'))
  ->toBeInstanceOf(Constraint::class);

  expect((string) $constraint)
  ->toEqual("CONSTRAINT test");

  expect((string) $stmt)
  ->toEqual("ALTER TABLE ADD CONSTRAINT test");

});