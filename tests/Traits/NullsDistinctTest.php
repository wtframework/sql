<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set nulls distinct', function ()
{

  expect(
    (string) SQL::constraint()
    ->nullsDistinct()
  )
  ->toEqual("NULLS DISTINCT");

});

it('can set nulls not distinct', function ()
{

  expect(
    (string) SQL::constraint()
    ->nullsNotDistinct()
  )
  ->toEqual("NULLS NOT DISTINCT");

});