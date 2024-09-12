<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Constraint;
use WTFramework\SQL\SQL;

it('can create constraint', function ()
{

  $stmt = SQL::create();

  expect($constraint = $stmt->constraint('test'))
  ->toBeInstanceOf(Constraint::class);

  expect((string) $constraint)
  ->toEqual("CONSTRAINT test");

  expect((string) $stmt)
  ->toEqual("CREATE TABLE (CONSTRAINT test)");

});