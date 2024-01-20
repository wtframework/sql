<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set storage parameter', function ()
{

  expect(
    (string) SQL::constraint()
    ->with('a')
  )
  ->toEqual("WITH (a)");

});

it('can set storage parameter with value', function ()
{

  expect(
    (string) SQL::constraint()
    ->with('a', 'b')
  )
  ->toEqual("WITH (a = b)");

});

it('can set multiple storage parameters', function ()
{

  expect(
    (string) SQL::constraint()
    ->with([
      'a',
      'b' => 'c'
    ])
  )
  ->toEqual("WITH (a, b = c)");

});