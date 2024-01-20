<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set include column', function ()
{

  expect(
    (string) SQL::constraint()
    ->include('c1')
  )
  ->toEqual("INCLUDE (c1)");

});

it('can set include multiple columns', function ()
{

  expect(
    (string) SQL::constraint()
    ->include(['c1', 'c2'])
  )
  ->toEqual("INCLUDE (c1, c2)");

});