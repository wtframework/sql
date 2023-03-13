<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLServer);

it('can create', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
  )
  ->toEqual('CREATE TABLE test ()');

});

it('can explain create', function ()
{

  expect(
    (string) $this->sql->create()
    ->explain()
  )
  ->toEqual('EXPLAIN CREATE TABLE ()');

});

it('can create as filetable', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->asFileTable()
  )
  ->toEqual('CREATE TABLE test AS FileTable ()');

});

it('can create with period for system time', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->periodForSystemTime(
      'test1',
      'test2'
    )
  )
  ->toEqual('CREATE TABLE test (PERIOD FOR SYSTEM_TIME (test1, test2))');

});

it('can create on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->on('test2')
  )
  ->toEqual('CREATE TABLE test1 () ON test2');

});

it('can create on column', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->on(
      'test2',
      'test3'
    )
  )
  ->toEqual('CREATE TABLE test1 () ON test2 (test3)');

});

it('can create textimage on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->textimageOn('test2')
  )
  ->toEqual('CREATE TABLE test1 () TEXTIMAGE_ON test2');

});

it('can create filestream on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->filestreamOn('test2')
  )
  ->toEqual('CREATE TABLE test1 () FILESTREAM_ON test2');

});