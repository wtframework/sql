<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Predicate;
use WTFramework\SQL\SQL;

it('can get is null', function ()
{

  expect((string) new Predicate(
    column: 'test',
    operator: null
  ))
  ->toEqual("test IS NULL");

  expect((string) new Predicate(
    column: 'test',
    value: null
  ))
  ->toEqual("test IS NULL");

});

it('can get equals', function ()
{

  expect((string) new Predicate('test', 1))
  ->toEqual("test = 1");

});

it('can get in', function ()
{

  expect((string) new Predicate('test', [1, 2]))
  ->toEqual("test IN (1, 2)");

});

it('can get between', function ()
{

  expect((string) new Predicate('test', 'BETWEEN', [1, 2]))
  ->toEqual("test BETWEEN 1 AND 2");

});

it('can get defined comparison', function ()
{

  expect((string) new Predicate('test', '<', 1))
  ->toEqual("test < 1");

});

it('can get equals bound value', function ()
{

  expect((string) $predicate = new Predicate('test1', 'test2'))
  ->toEqual("test1 = ?");

  expect($predicate->bindings())
  ->toEqual(['test2']);

});

it('can get in bound values', function ()
{

  expect((string) $predicate = new Predicate('test1', ['test2', 'test3']))
  ->toEqual("test1 IN (?, ?)");

  expect($predicate->bindings())
  ->toEqual(['test2', 'test3']);

});

it('can get equals raw value', function ()
{

  expect((string) new Predicate('test1', SQL::raw('test2')))
  ->toEqual("test1 = test2");

});

it('can get in raw values', function ()
{

  expect((string) new Predicate('test1', [
    SQL::raw('test2'),
    SQL::raw('test3'),
  ]))
  ->toEqual("test1 IN (test2, test3)");

});

it('can get bound value equals', function ()
{

  expect((string) $predicate = new Predicate(SQL::bind('test1'), 'test2'))
  ->toEqual("? = ?");

  expect($predicate->bindings())
  ->toEqual(['test1', 'test2']);

});