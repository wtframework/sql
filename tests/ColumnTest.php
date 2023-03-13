<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

it('can set constraint string', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->constraint('test2')
  )
  ->toEqual('test test2');

});

it('can set constraint object', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->constraint(DBMS::MariaDB->constraint('test2'))
  )
  ->toEqual('test CONSTRAINT test2');

});

it('can set constraint closure', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->constraint(fn ($c) => $c->primaryKey())
  )
  ->toEqual('test PRIMARY KEY');

});

it('can set constraint named closure', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->constraint(
      fn ($c) => $c->primaryKey(),
      'test2'
    )
  )
  ->toEqual('test CONSTRAINT test2 PRIMARY KEY');

});

it('can set signed', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->signed()
  )
  ->toEqual('test SIGNED');

});

it('can set unsigned', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->unsigned()
  )
  ->toEqual('test UNSIGNED');

});