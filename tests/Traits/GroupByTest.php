<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can group by', function ()
{

  expect(
    (string) SQL::select()
    ->groupBy('c1')
  )
  ->toBe("SELECT * GROUP BY c1");

});

it('can group by multiples', function ()
{

  expect(
    (string) SQL::select()
    ->groupBy(['c1', 'c2'])
  )
  ->toBe("SELECT * GROUP BY c1, c2");

});

it('can group by desc', function ()
{

  expect(
    (string) SQL::select()
    ->groupByDesc('c1')
  )
  ->toBe("SELECT * GROUP BY c1 DESC");

});

it('can group by multiples desc', function ()
{

  expect(
    (string) SQL::select()
    ->groupByDesc(['c1', 'c2'])
  )
  ->toBe("SELECT * GROUP BY c1 DESC, c2 DESC");

});

it('can group by with rollup', function ()
{

  expect(
    (string) SQL::select()
    ->groupBy('c1')
    ->withRollup()
  )
  ->toBe("SELECT * GROUP BY c1 WITH ROLLUP");

});

it('can group by bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->groupBy(SQL::bind('test'))
  )
  ->toBe("SELECT * GROUP BY ?");

  expect($stmt->bindings())
  ->toBe(['test']);

});