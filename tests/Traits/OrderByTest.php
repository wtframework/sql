<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can order by column', function ()
{

  expect(
    (string) SQL::select()
    ->orderBy('test')
  )
  ->toEqual("SELECT * ORDER BY test");

});

it('can order by multiple columns', function ()
{

  expect(
    (string) SQL::select()
    ->orderBy(['test1', 'test2'])
  )
  ->toEqual("SELECT * ORDER BY test1, test2");

});

it('can order by column desc', function ()
{

  expect(
    (string) SQL::select()
    ->orderByDesc('test')
  )
  ->toEqual("SELECT * ORDER BY test DESC");

});

it('can order by multiple columns desc', function ()
{

  expect(
    (string) SQL::select()
    ->orderByDesc(['test1', 'test2'])
  )
  ->toEqual("SELECT * ORDER BY test1 DESC, test2 DESC");

});

it('can order by column using', function ()
{

  expect(
    (string) SQL::select()
    ->orderByUsing('test', '>')
  )
  ->toEqual("SELECT * ORDER BY test USING >");

});

it('can order by multiple columns using', function ()
{

  expect(
    (string) SQL::select()
    ->orderByUsing(['test1', 'test2'], '>')
  )
  ->toEqual("SELECT * ORDER BY test1 USING >, test2 USING >");

});

it('can order by column nulls first', function ()
{

  expect(
    (string) SQL::select()
    ->orderByNullsFirst('test')
  )
  ->toEqual("SELECT * ORDER BY test NULLS FIRST");

});

it('can order by multiple columns nulls first', function ()
{

  expect(
    (string) SQL::select()
    ->orderByNullsFirst(['test1', 'test2'])
  )
  ->toEqual("SELECT * ORDER BY test1 NULLS FIRST, test2 NULLS FIRST");

});

it('can order by column nulls last', function ()
{

  expect(
    (string) SQL::select()
    ->orderByNullsLast('test')
  )
  ->toEqual("SELECT * ORDER BY test NULLS LAST");

});

it('can order by multiple columns nulls last', function ()
{

  expect(
    (string) SQL::select()
    ->orderByNullsLast(['test1', 'test2'])
  )
  ->toEqual("SELECT * ORDER BY test1 NULLS LAST, test2 NULLS LAST");

});

it('can order by column desc nulls first', function ()
{

  expect(
    (string) SQL::select()
    ->orderByDescNullsFirst('test')
  )
  ->toEqual("SELECT * ORDER BY test DESC NULLS FIRST");

});

it('can order by multiple columns desc nulls first', function ()
{

  expect(
    (string) SQL::select()
    ->orderByDescNullsFirst(['test1', 'test2'])
  )
  ->toEqual("SELECT * ORDER BY test1 DESC NULLS FIRST, test2 DESC NULLS FIRST");

});

it('can order by column desc nulls last', function ()
{

  expect(
    (string) SQL::select()
    ->orderByDescNullsLast('test')
  )
  ->toEqual("SELECT * ORDER BY test DESC NULLS LAST");

});

it('can order by multiple columns desc nulls last', function ()
{

  expect(
    (string) SQL::select()
    ->orderByDescNullsLast(['test1', 'test2'])
  )
  ->toEqual("SELECT * ORDER BY test1 DESC NULLS LAST, test2 DESC NULLS LAST");

});

it('can order by column using nulls first', function ()
{

  expect(
    (string) SQL::select()
    ->orderByUsingNullsFirst('test', '>')
  )
  ->toEqual("SELECT * ORDER BY test USING > NULLS FIRST");

});

it('can order by multiple columns using nulls first', function ()
{

  expect(
    (string) SQL::select()
    ->orderByUsingNullsFirst(['test1', 'test2'], '>')
  )
  ->toEqual(
    "SELECT * ORDER BY test1 USING > NULLS FIRST, test2 USING > NULLS FIRST"
  );

});

it('can order by column using nulls last', function ()
{

  expect(
    (string) SQL::select()
    ->orderByUsingNullsLast('test', '>')
  )
  ->toEqual("SELECT * ORDER BY test USING > NULLS LAST");

});

it('can order by multiple columns using nulls last', function ()
{

  expect(
    (string) SQL::select()
    ->orderByUsingNullsLast(['test1', 'test2'], '>')
  )
  ->toEqual(
    "SELECT * ORDER BY test1 USING > NULLS LAST, test2 USING > NULLS LAST"
  );

});

it('can order by bound value', function ()
{

  expect(
    (string) $stmt = SQL::select()
    ->orderBy(SQL::bind('test'))
  )
  ->toEqual("SELECT * ORDER BY ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});