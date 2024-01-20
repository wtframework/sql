<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set enforced', function ()
{

  expect(
    (string) SQL::constraint()
    ->enforced()
  )
  ->toEqual("ENFORCED");

});

it('can set not enforced', function ()
{

  expect(
    (string) SQL::constraint()
    ->notEnforced()
  )
  ->toEqual("NOT ENFORCED");

});