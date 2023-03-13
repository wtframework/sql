<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

it('can get', function ()
{

  expect(
    (string) $this->sql->column('test')
  )
  ->toEqual('test');

});

it('can set constraint', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->constraint('test2')
  )
  ->toEqual('test test2');

});

it('can set primary key', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->primaryKey()
  )
  ->toEqual('test PRIMARY KEY');

});

it('can set not null', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->notNull()
  )
  ->toEqual('test NOT NULL');

});

it('can set unique', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->unique()
  )
  ->toEqual('test UNIQUE');

});

it('can set on conflict', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->onConflictFail()
  )
  ->toEqual('test ON CONFLICT FAIL');

});

it('can set auto increment', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->autoIncrement()
  )
  ->toEqual('test AUTOINCREMENT');

});

it('can set check', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->check('test2')
  )
  ->toEqual('test CHECK (test2)');

});

it('can set default', function ()
{

  expect(
    (string) $column = $this->sql->column('test')
    ->default('test')
  )
  ->toEqual('test DEFAULT (?)');

});

it('can set charset', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->charset('utf8')
  )
  ->toEqual('test CHARACTER SET utf8');

});

it('can set references', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->references('test2', 'test3')
  )
  ->toEqual('test REFERENCES test2 (test3)');

});

it('can set column', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->column('test2')
  )
  ->toEqual('test (test2)');

});

it('can set on delete', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->onDeleteSetNull()
  )
  ->toEqual('test ON DELETE SET NULL');

});

it('can set on update', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->onUpdateSetNull()
  )
  ->toEqual('test ON UPDATE SET NULL');

});

it('can set deferred', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->deferrableInitiallyDeferred()
  )
  ->toEqual('test DEFERRABLE INITIALLY DEFERRED');

});

it('can set generated always', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->generatedAlways('test2')
  )
  ->toEqual('test GENERATED ALWAYS AS (test2)');

});