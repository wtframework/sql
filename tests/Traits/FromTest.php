<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select from table', function ()
{

  expect(
    (string) SQL::select()
    ->from('t1')
  )
  ->toBe("SELECT * FROM t1");

});

it('can select from multiple tables', function ()
{

  expect(
    (string) SQL::select()
    ->from(['t1', 't2'])
  )
  ->toBe("SELECT * FROM t1, t2");

});

it('can select from table with alias', function ()
{

  expect(
    (string) SQL::select()
    ->from(['t2' => 't1'])
  )
  ->toBe("SELECT * FROM t1 AS t2");

});

it('can select from bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->from(SQL::bind('t1'))
  )
  ->toBe("SELECT * FROM ?");

  expect($stmt->bindings())
  ->toBe(['t1']);

});