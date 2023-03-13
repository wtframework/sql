<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::PostgreSQL);

it('can get', function ()
{

  expect(
    (string) $this->sql->column('test')
  )
  ->toEqual('test');

});

it('can get if not exists', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->ifNotExists()
  )
  ->toEqual('IF NOT EXISTS test');

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

it('can set include column', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->includeColumn('test1')
  )
  ->toEqual('test INCLUDE (test1)');

});

it('can set include multiple columns', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->includeColumn(['test1', 'test2'])
  )
  ->toEqual('test INCLUDE (test1, test2)');

});

it('can set storage parameter', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->with('test1', 'test2')
  )
  ->toEqual('test WITH (test1=test2)');

});

it('can set using index tablespace', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->usingIndexTablespace('test1')
  )
  ->toEqual('test USING INDEX TABLESPACE test1');

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

it('can set check', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->check('test2')
  )
  ->toEqual('test CHECK (test2)');

});

it('can set signed', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->signed()
  )
  ->toEqual('test SIGNED');

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
    ->stored()
  )
  ->toEqual('test GENERATED ALWAYS AS (test2) STORED');

});