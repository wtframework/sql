<?php

declare(strict_types=1);

use WTFramework\SQL\Column;
use WTFramework\SQL\Constraint;
use WTFramework\SQL\DBMS;
use WTFramework\SQL\Statements\Alter;
use WTFramework\SQL\Statements\Create;
use WTFramework\SQL\Statements\Delete;
use WTFramework\SQL\Statements\Drop;
use WTFramework\SQL\Statements\Insert;
use WTFramework\SQL\Statements\Replace;
use WTFramework\SQL\Statements\Select;
use WTFramework\SQL\Statements\Truncate;
use WTFramework\SQL\Statements\Update;

it('can get delete statement', function ()
{

  expect(DBMS::MariaDB->delete())
  ->toBeInstanceOf(Delete::class);

});

it('can get alter statement', function ()
{

  expect(DBMS::MariaDB->alter())
  ->toBeInstanceOf(Alter::class);

});

it('can get create statement', function ()
{

  expect(DBMS::MariaDB->create())
  ->toBeInstanceOf(Create::class);

});

it('can get drop statement', function ()
{

  expect(DBMS::MariaDB->drop())
  ->toBeInstanceOf(Drop::class);

});

it('can get insert statement', function ()
{

  expect(DBMS::MariaDB->insert())
  ->toBeInstanceOf(Insert::class);

});

it('can get replace statement', function ()
{

  expect(DBMS::MariaDB->replace())
  ->toBeInstanceOf(Replace::class);

});

it('can get select statement', function ()
{

  expect(DBMS::MariaDB->select())
  ->toBeInstanceOf(Select::class);

});

it('can get truncate statement', function ()
{

  expect(DBMS::MariaDB->truncate())
  ->toBeInstanceOf(Truncate::class);

});

it('can get update statement', function ()
{

  expect(DBMS::MariaDB->update())
  ->toBeInstanceOf(Update::class);

});

it('can get column', function ()
{

  expect(DBMS::MariaDB->column(''))
  ->toBeInstanceOf(Column::class);

});

it('can get column constraint', function ()
{

  expect(DBMS::MariaDB->constraint())
  ->toBeInstanceOf(Constraint::class);

});