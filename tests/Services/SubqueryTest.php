<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get subquery', function ()
{

  expect(
    (string) SQL::subquery('SELECT')
    ->exists()
    ->forSystemTimeAll()
    ->alias('s1')
    ->column('c1')
  )
  ->toBe(
    "EXISTS "
  . "(SELECT) "
  . "FOR SYSTEM_TIME ALL "
  . "AS s1 "
  . "(c1)"
  );

  expect((string) SQL::subquery('SELECT')->all())
  ->toBe("ALL (SELECT)");

  expect((string) SQL::subquery('SELECT')->any())
  ->toBe("ANY (SELECT)");

  expect((string) SQL::subquery('SELECT')->lateral())
  ->toBe("LATERAL (SELECT)");

});