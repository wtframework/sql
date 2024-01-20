<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can match simple', function ()
{

  expect(
    (string) SQL::constraint()
    ->matchSimple()
  )
  ->toEqual("MATCH SIMPLE");

});

it('can match full', function ()
{

  expect(
    (string) SQL::constraint()
    ->matchFull()
  )
  ->toEqual("MATCH FULL");

});