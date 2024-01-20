<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can reference table', function ()
{

  expect(
    (string) SQL::constraint()
    ->references('t1')
  )
  ->toEqual("REFERENCES t1");

});

it('can reference table and constraint', function ()
{

  expect(
    (string) SQL::constraint()
    ->references('t1', 'c1')
  )
  ->toEqual("REFERENCES t1 (c1)");

});

it('can reference table and multiple constraints', function ()
{

  expect(
    (string) SQL::constraint()
    ->references('t1', ['c1', 'c2'])
  )
  ->toEqual("REFERENCES t1 (c1, c2)");

});