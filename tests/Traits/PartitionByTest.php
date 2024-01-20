<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can partition by hash', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByHash('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY HASH(test)");

});

it('can partition by linear hash', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByLinearHash('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY LINEAR HASH(test)");

});

it('can partition by key', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByKey('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY KEY(test)");

});

it('can partition by key multiple columns', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByKey(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE PARTITION BY KEY(test1, test2)");

});

it('can partition by linear key', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByLinearKey('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY LINEAR KEY(test)");

});

it('can partition by linear key multiple columns', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByLinearKey(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE PARTITION BY LINEAR KEY(test1, test2)");

});

it('can partition by range', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByRange('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY RANGE(test)");

});

it('can partition by range multiple expressions', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByRange(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE PARTITION BY RANGE(test1, test2)");

});

it('can partition by range column', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByRangeColumns('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY RANGE COLUMNS(test)");

});

it('can partition by range multiple columns', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByRangeColumns(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE PARTITION BY RANGE COLUMNS(test1, test2)");

});

it('can partition by list', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByList('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY LIST(test)");

});

it('can partition by list column', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByListColumns('test')
  )
  ->toEqual("CREATE TABLE PARTITION BY LIST COLUMNS(test)");

});

it('can partition by list multiple columns', function ()
{

  expect(
    (string) SQL::create()
    ->partitionByListColumns(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE PARTITION BY LIST COLUMNS(test1, test2)");

});