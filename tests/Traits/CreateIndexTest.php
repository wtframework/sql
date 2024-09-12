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

it('can create named index', function ()
{

  expect(
    (string) SQL::create()
    ->index('test1', 'test2')
  )
  ->toEqual("CREATE TABLE (INDEX test2 (test1))");

});

it('can create named multiple column index', function ()
{

  expect(
    (string) SQL::create()
    ->index(['test1', 'test2'], 'test3')
  )
  ->toEqual("CREATE TABLE (INDEX test3 (test1, test2))");

});

it('can create index using service', function ()
{

  expect(
    (string) SQL::create()
    ->index(SQL::index('test'))
  )
  ->toEqual("CREATE TABLE (INDEX (test))");

});