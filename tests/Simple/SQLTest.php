<?php

declare(strict_types=1);

use WTFramework\SQL\Simple\SQL;
use WTFramework\SQL\Simple\Statements\Delete;
use WTFramework\SQL\Simple\Statements\Insert;
use WTFramework\SQL\Simple\Statements\Replace;
use WTFramework\SQL\Simple\Statements\Select;
use WTFramework\SQL\Simple\Statements\Truncate;
use WTFramework\SQL\Simple\Statements\Update;
use WTFramework\SQL\Grammar;
use WTFramework\SQL\Services\Raw;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\Services\Table;
use WTFramework\SQL\Services\Upsert;

it('can set global grammar', function ()
{

  SQL::use(null);

  expect(SQL::select()->grammar())
  ->toBe(Grammar::MySQL);

  SQL::use(Grammar::MariaDB);

  expect(SQL::select()->grammar())
  ->toBe(Grammar::MariaDB);

});

it('can get delete statement', function ()
{

  expect(SQL::delete())
  ->toBeInstanceOf(Delete::class);

});

it('can get insert statement', function ()
{

  expect(SQL::insert())
  ->toBeInstanceOf(Insert::class);

});

it('can get replace statement', function ()
{

  expect(SQL::replace())
  ->toBeInstanceOf(Replace::class);

});

it('can get select statement', function ()
{

  expect(SQL::select())
  ->toBeInstanceOf(Select::class);

});

it('can get truncate statement', function ()
{

  expect(SQL::truncate())
  ->toBeInstanceOf(Truncate::class);

});

it('can get update statement', function ()
{

  expect(SQL::update())
  ->toBeInstanceOf(Update::class);

});

it('can bind value', function ()
{

  expect($raw = SQL::bind(1))
  ->toBeInstanceOf(Raw::class);

  expect((string) $raw)
  ->toBe('?');

  expect($raw->bindings())
  ->toBe([1]);

});

it('can get raw sql', function ()
{

  expect($raw = SQL::raw('test'))
  ->toBeInstanceOf(Raw::class);

  expect((string) $raw)
  ->toBe('test');

});

it('can get subquery', function ()
{

  expect($subquery = SQL::subquery('SELECT'))
  ->toBeInstanceOf(Subquery::class);

  expect((string) $subquery)
  ->toBe('(SELECT)');

});

it('can get table', function ()
{

  expect($table = SQL::table('t1'))
  ->toBeInstanceOf(Table::class);

  expect((string) $table)
  ->toBe('t1');

});

it('can get upsert', function ()
{

  expect($upsert = SQL::upsert())
  ->toBeInstanceOf(Upsert::class);

  expect((string) $upsert)
  ->toBe('DO NOTHING');

});