<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select column', function ()
{

  expect(
    (string) SQL::select()
    ->column('c1')
  )
  ->toBe("SELECT c1");

});

it('can select multiple columns', function ()
{

  expect(
    (string) SQL::select()
    ->column(['c1', 'c2'])
  )
  ->toBe("SELECT c1, c2");

});

it('can select column with alias', function ()
{

  expect(
    (string) SQL::select()
    ->column(['c2' => 'c1'])
  )
  ->toBe("SELECT c1 AS c2");

});

it('can select bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->column(SQL::bind('test'))
  )
  ->toBe("SELECT ?");

  expect($stmt->bindings())
  ->toBe(['test']);

});