<?php

declare(strict_types=1);

use WTFramework\SQL\Predicate;
use WTFramework\SQL\SQL;

it('can get column', function ()
{

  expect((string) new Predicate('test'))
  ->toEqual('test');

});

it('can get null', function ()
{

  expect((string) new Predicate(null))
  ->toEqual('NULL');

});

it('can get bound value', function ()
{

  expect((string) $predicate = new Predicate(SQL::bind('test')))
  ->toEqual('?');

  expect($predicate->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get default equals', function ()
{

  expect((string) $predicate = new Predicate(
    'test1',
    'test2'
  ))
  ->toEqual('test1 = ?');

  expect($predicate->bindings())
  ->toEqual([[
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get default null', function ()
{

  expect((string) new Predicate(
    'test1',
    null
  ))
  ->toEqual('test1 IS NULL');

});

it('can get default in', function ()
{

  expect((string) $predicate = new Predicate(
    'test1',
    ['test2', 'test3']
  ))
  ->toEqual('test1 IN (?, ?)');

  expect($predicate->bindings())
  ->toEqual([[
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 'test3',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get raw sql', function ()
{

  expect((string) new Predicate(
    'test1',
    SQL::raw('test2')
  ))
  ->toEqual('test1 = test2');

});

it('can get with defined operator', function ()
{

  expect((string) $predicate = new Predicate(
    'test1',
    '!=',
    'test2'
  ))
  ->toEqual('test1 != ?');

  expect($predicate->bindings())
  ->toEqual([[
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get between', function ()
{

  expect((string) $predicate = new Predicate(
    'test1',
    'BETWEEN',
    ['test2', 'test3']
  ))
  ->toEqual('test1 BETWEEN ? AND ?');

  expect($predicate->bindings())
  ->toEqual([[
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 'test3',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can get exists', function ()
{

  expect((string) new Predicate(
    'test',
    'EXISTS',
    SQL::raw('SELECT *')
  ))
  ->toEqual('test EXISTS (SELECT *)');

});

it('can get exists subquery', function ()
{

  expect((string) new Predicate(
    'test',
    'EXISTS',
    SQL::subquery('SELECT *')
  ))
  ->toEqual('test EXISTS (SELECT *)');

});

it('can get skipped opreator', function ()
{

  expect((string) $predicate = new Predicate(
    column: 'test1',
    value: 'test2',
  ))
  ->toEqual('test1 = ?');

  expect($predicate->bindings())
  ->toEqual([[
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ]]);

});