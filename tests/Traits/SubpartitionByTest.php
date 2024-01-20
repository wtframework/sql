<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can subpartition by hash', function ()
{

  expect(
    (string) SQL::create()
    ->subpartitionByHash('test')
  )
  ->toEqual("CREATE TABLE SUBPARTITION BY HASH(test)");

});

it('can subpartition by linear hash', function ()
{

  expect(
    (string) SQL::create()
    ->subpartitionByLinearHash('test')
  )
  ->toEqual("CREATE TABLE SUBPARTITION BY LINEAR HASH(test)");

});

it('can subpartition by key', function ()
{

  expect(
    (string) SQL::create()
    ->subpartitionByKey('test')
  )
  ->toEqual("CREATE TABLE SUBPARTITION BY KEY(test)");

});

it('can subpartition by key multiple columns', function ()
{

  expect(
    (string) SQL::create()
    ->subpartitionByKey(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE SUBPARTITION BY KEY(test1, test2)");

});

it('can subpartition by linear key', function ()
{

  expect(
    (string) SQL::create()
    ->subpartitionByLinearKey('test')
  )
  ->toEqual("CREATE TABLE SUBPARTITION BY LINEAR KEY(test)");

});

it('can subpartition by linear key multiple columns', function ()
{

  expect(
    (string) SQL::create()
    ->subpartitionByLinearKey(['test1', 'test2'])
  )
  ->toEqual("CREATE TABLE SUBPARTITION BY LINEAR KEY(test1, test2)");

});