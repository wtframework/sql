<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Services\Column;
use WTFramework\SQL\Services\Constraint;
use WTFramework\SQL\Services\CTE;
use WTFramework\SQL\Services\Index;
use WTFramework\SQL\Services\Outfile;
use WTFramework\SQL\Services\Partition;
use WTFramework\SQL\Services\Raw;
use WTFramework\SQL\Services\Subpartition;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\Services\Table;
use WTFramework\SQL\Services\Upsert;
use WTFramework\SQL\Services\Window;
use WTFramework\SQL\SQL;
use WTFramework\SQL\Statements\Alter;
use WTFramework\SQL\Statements\Create;
use WTFramework\SQL\Statements\CreateIndex;
use WTFramework\SQL\Statements\Delete;
use WTFramework\SQL\Statements\Drop;
use WTFramework\SQL\Statements\DropIndex;
use WTFramework\SQL\Statements\Insert;
use WTFramework\SQL\Statements\Replace;
use WTFramework\SQL\Statements\Select;
use WTFramework\SQL\Statements\Truncate;
use WTFramework\SQL\Statements\Update;

it('can set global grammar', function ()
{

  SQL::use(null);

  expect(SQL::select()->grammar())
  ->toBe(Grammar::MySQL);

  SQL::use(Grammar::MariaDB);

  expect(SQL::select()->grammar())
  ->toBe(Grammar::MariaDB);

});

it('can get alter statement', function ()
{

  expect(SQL::alter())
  ->toBeInstanceOf(Alter::class);

});

it('can get create statement', function ()
{

  expect(SQL::create())
  ->toBeInstanceOf(Create::class);

});

it('can get create index statement', function ()
{

  expect($stmt = SQL::createIndex('i0'))
  ->toBeInstanceOf(CreateIndex::class);

  expect((string) $stmt)
  ->toBe("CREATE INDEX i0");

});

it('can get delete statement', function ()
{

  expect(SQL::delete())
  ->toBeInstanceOf(Delete::class);

});

it('can get drop statement', function ()
{

  expect(SQL::drop())
  ->toBeInstanceOf(Drop::class);

});

it('can get drop index statement', function ()
{

  expect($stmt = SQL::dropIndex('i0'))
  ->toBeInstanceOf(DropIndex::class);

  expect((string) $stmt)
  ->toBe("DROP INDEX i0");

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

it('can get column', function ()
{

  expect($column = SQL::column('c1'))
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toBe("c1");

});

it('can get constraint', function ()
{

  expect($constraint = SQL::constraint('a'))
  ->toBeInstanceOf(Constraint::class);

  expect((string) $constraint)
  ->toBe("CONSTRAINT a");

});

it('can get cte', function ()
{

  expect($cte = SQL::cte('cte', 'SELECT'))
  ->toBeInstanceOf(CTE::class);

  expect((string) $cte)
  ->toBe('cte AS (SELECT)');

});

it('can get index', function ()
{

  expect($index = SQL::index('i0'))
  ->toBeInstanceOf(Index::class);

  expect((string) $index)
  ->toBe("INDEX i0");

});

it('can get outfile', function ()
{

  expect($outfile = SQL::outfile('path'))
  ->toBeInstanceOf(Outfile::class);

  expect((string) $outfile)
  ->toBe("'path'");

});

it('can get partition', function ()
{

  expect($partition = SQL::partition('p0'))
  ->toBeInstanceOf(Partition::class);

  expect((string) $partition)
  ->toBe("PARTITION p0");

});

it('can get raw sql', function ()
{

  expect($raw = SQL::raw('test'))
  ->toBeInstanceOf(Raw::class);

  expect((string) $raw)
  ->toBe('test');

});

it('can get subpartition', function ()
{

  expect($subpartition = SQL::subpartition('p0'))
  ->toBeInstanceOf(Subpartition::class);

  expect((string) $subpartition)
  ->toBe("SUBPARTITION p0");

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

it('can get window', function ()
{

  expect($window = SQL::window('w'))
  ->toBeInstanceOf(Window::class);

  expect((string) $window)
  ->toBe('w');

});