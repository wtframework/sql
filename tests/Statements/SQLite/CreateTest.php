<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

it('can create', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
  )
  ->toEqual('CREATE TABLE test');

});

it('can explain create', function ()
{

  expect(
    (string) $this->sql->create()
    ->explain()
  )
  ->toEqual('EXPLAIN CREATE TABLE');

});

it('can create temporary', function ()
{

  expect(
    (string) $this->sql->create()
    ->temporary()
    ->table('test')
  )
  ->toEqual('CREATE TEMPORARY TABLE test');

});

it('can create if not exists', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->ifNotExists()
  )
  ->toEqual('CREATE TABLE IF NOT EXISTS test');

});

it('can add column', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->column('test2 INT')
  )
  ->toEqual('CREATE TABLE test1 (test2 INT)');

});

it('can add constraint', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->constraint('test2')
  )
  ->toEqual('CREATE TABLE test1 (test2)');

});

it('can set check', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->check('test2')
  )
  ->toEqual('CREATE TABLE test1 (CHECK (test2))');

});

it('can create as', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->as('SELECT *')
  )
  ->toEqual('CREATE TABLE test1 AS SELECT *');

});

it('can create without row ID', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->withoutRowID()
  )
  ->toEqual('CREATE TABLE test WITHOUT ROWID');

});

it('can create strict', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->strict()
  )
  ->toEqual('CREATE TABLE test STRICT');

});