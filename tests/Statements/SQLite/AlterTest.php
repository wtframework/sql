<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

it('can alter', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
  )
  ->toEqual('ALTER TABLE test');

});

it('can explain alter', function ()
{

  expect(
    (string) $this->sql->alter()
    ->explain()
  )
  ->toEqual('EXPLAIN ALTER TABLE');

});

it('can rename table', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->renameTo('test2')
  )
  ->toEqual('ALTER TABLE test1 RENAME TO test2');

});

it('can rename column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->renameColumn(
      'test2',
      'test3'
    )
  )
  ->toEqual('ALTER TABLE test1 RENAME COLUMN test2 TO test3');

});

it('can add column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->addColumn('test2 INT')
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2 INT');

});

it('can drop column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropColumn('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP COLUMN test2');

});