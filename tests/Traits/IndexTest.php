<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can create index', function ()
{

  expect(
    (string) SQL::create()
    ->index('test')
  )
  ->toEqual("CREATE TABLE (INDEX (test))");

});

it('can create multiple column index', function ()
{

  expect(
    (string) SQL::create()
    ->index(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE (INDEX (test1, test2))");

});

it('can create multiple indexes', function ()
{

  expect(
    (string) SQL::create()
    ->index([['test1'], ['test2']])
  )
  ->toEqual("CREATE TABLE (INDEX (test1), INDEX (test2))");

});

it('can create index using service', function ()
{

  expect(
    (string) SQL::create()
    ->index(SQL::index()->column('test'))
  )
  ->toEqual("CREATE TABLE (INDEX (test))");

});