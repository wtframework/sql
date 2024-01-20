<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get values', function ()
{

  expect(
    (string) SQL::select()
    ->values([1, 2])
  )
  ->toEqual("VALUES (1, 2)");

});

it('can get multiple value sets', function ()
{

  expect(
    (string) SQL::select()
    ->values([
      [1, 2],
      [3, 4],
    ])
  )
  ->toEqual("VALUES (1, 2), (3, 4)");

});

it('can get bound values', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->values(['test1', 'test2'])
  )
  ->toEqual("VALUES (?, ?)");

  expect($stmt->bindings())
  ->toEqual(['test1', 'test2']);

});

it('can get raw values', function ()
{

  expect(
    (string) SQL::select()
    ->values([SQL::raw('test1'), SQL::raw('test2')])
  )
  ->toEqual("VALUES (test1, test2)");

});