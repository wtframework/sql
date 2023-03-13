<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MySQL);

it('can get', function ()
{

  expect(
    (string) $this->sql->column('test')
  )
  ->toEqual('test');

});

it('can set first', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->first()
  )
  ->toEqual('test FIRST');

});

it('can set after', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->after('test2')
  )
  ->toEqual('test AFTER test2');

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

it('can set auto increment', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->autoIncrement()
  )
  ->toEqual('test AUTO_INCREMENT');

});

it('can set check', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->check('test2')
  )
  ->toEqual('test CHECK (test2)');

});

it('can set enforced', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->enforced('test2')
  )
  ->toEqual('test ENFORCED');

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

it('can set invisible', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->invisible()
  )
  ->toEqual('test INVISIBLE');

});

it('can set comment', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->comment("test 'test'")
  )
  ->toEqual("test COMMENT 'test ''test'''");

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

it('can set generated always', function ()
{

  expect(
    (string) $this->sql->column('test')
    ->generatedAlways('test2')
  )
  ->toEqual('test GENERATED ALWAYS AS (test2)');

});