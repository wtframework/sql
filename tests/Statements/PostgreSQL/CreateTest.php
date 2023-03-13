<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

beforeEach(fn () => $this->sql = DBMS::PostgreSQL);

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

it('can create unlogged', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->unlogged()
  )
  ->toEqual('CREATE UNLOGGED TABLE test');

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

it('can add index', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->index('test2')
  )
  ->toEqual('CREATE TABLE test1 (INDEX (test2))');

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

it('can create of', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->of('test2')
  )
  ->toEqual('CREATE TABLE test1 OF test2');

});

it('can create partition of', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionOf('test2')
  )
  ->toEqual('CREATE TABLE test1 PARTITION OF test2 DEFAULT');

});

it('can use for values in', function ()
{

  expect(
    (string) $stmt = $this->sql->create()
    ->table('test1')
    ->partitionOf('test2')
    ->forValuesIn(['test3', 'test4'])
  )
  ->toEqual('CREATE TABLE test1 PARTITION OF test2 FOR VALUES IN (?, ?)');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 'test3',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 'test4',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can use for values from', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionOf('test2')
    ->forValuesFrom(SQL::raw('MINVALUE'))
    ->to(SQL::raw('MAXVALUE'))
  )
  ->toEqual(
    'CREATE TABLE test1 PARTITION OF test2 '
  . 'FOR VALUES FROM (MINVALUE) TO (MAXVALUE)'
  );

});

it('can use for values with', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionOf('test2')
    ->forValuesWith(2, 1)
  )
  ->toEqual(
    'CREATE TABLE test1 PARTITION OF test2 '
  . 'FOR VALUES WITH (MODULUS 2, REMAINDER 1)'
  );

});

it('can create like', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->like('test2')
  )
  ->toEqual('CREATE TABLE test1 (LIKE test2)');

});

it('can create like with options', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->like('test2')
    ->includingAll()
    ->includingComments()
    ->includingCompression()
    ->includingConstraints()
    ->includingDefaults()
    ->includingGenerated()
    ->includingIdentity()
    ->includingIndexes()
    ->includingStatistics()
    ->includingStorage()
    ->excludingAll()
    ->excludingComments()
    ->excludingCompression()
    ->excludingConstraints()
    ->excludingDefaults()
    ->excludingGenerated()
    ->excludingIdentity()
    ->excludingIndexes()
    ->excludingStatistics()
    ->excludingStorage()
  )
  ->toEqual(
    'CREATE TABLE test1 (LIKE test2 '
  . 'INCLUDING ALL '
  . 'INCLUDING COMMENTS '
  . 'INCLUDING COMPRESSION '
  . 'INCLUDING CONSTRAINTS '
  . 'INCLUDING DEFAULTS '
  . 'INCLUDING GENERATED '
  . 'INCLUDING IDENTITY '
  . 'INCLUDING INDEXES '
  . 'INCLUDING STATISTICS '
  . 'INCLUDING STORAGE '
  . 'EXCLUDING ALL '
  . 'EXCLUDING COMMENTS '
  . 'EXCLUDING COMPRESSION '
  . 'EXCLUDING CONSTRAINTS '
  . 'EXCLUDING DEFAULTS '
  . 'EXCLUDING GENERATED '
  . 'EXCLUDING IDENTITY '
  . 'EXCLUDING INDEXES '
  . 'EXCLUDING STATISTICS '
  . 'EXCLUDING STORAGE)'
  );

});

it('can inherit table', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->inherits('test2')
  )
  ->toEqual('CREATE TABLE test1 INHERITS test2');

});

it('can inherit multiple tables', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->inherits(['test2', 'test3'])
  )
  ->toEqual('CREATE TABLE test1 INHERITS test2, test3');

});

it('can partition by range', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByRange('test2')
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY RANGE (test2)');

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByRange(
      'test2',
      'utf8'
    )
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY RANGE (test2 COLLATE utf8)');

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByRange(
      column: 'test2',
      opclass: 'test3'
    )
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY RANGE (test2 test3)');

});

it('can partition multiple columns by range', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByRange(['test2', 'test3'])
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY RANGE (test2, test3)');

});

it('can create partition by list', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByList('test2')
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY LIST (test2)');

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByList(
      'test2',
      'utf8'
    )
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY LIST (test2 COLLATE utf8)');

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByList(
      column: 'test2',
      opclass: 'test3'
    )
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY LIST (test2 test3)');

});

it('can create partition by hash', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByHash('test2')
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY HASH (test2)');

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByHash(
      'test2',
      'utf8'
    )
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY HASH (test2 COLLATE utf8)');

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByHash(
      column: 'test2',
      opclass: 'test3'
    )
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY HASH (test2 test3)');

});

it('can create partition multiple columns by hash', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->partitionByHash(['test2', 'test3'])
  )
  ->toEqual('CREATE TABLE test1 PARTITION BY HASH (test2, test3)');

});

it('can create using method', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->usingMethod('heap')
  )
  ->toEqual('CREATE TABLE test USING heap');

});

it('can create with storage parameter', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->with('test2', 'test3')
  )
  ->toEqual('CREATE TABLE test1 WITH (test2=test3)');

});

it('can create with multiple storage parameters', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->with([
      'test1' => null,
      'test2' => true,
      'test3' => false,
      'test4' => 1,
    ])
  )
  ->toEqual('CREATE TABLE test WITH (test1, test2=TRUE, test3=FALSE, test4=1)');

});

it('can create on commit delete rows', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->onCommitDeleteRows()
  )
  ->toEqual('CREATE TABLE test ON COMMIT DELETE ROWS');

});

it('can create on commit drop', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->onCommitDrop()
  )
  ->toEqual('CREATE TABLE test ON COMMIT DROP');

});

it('can create with tablespace', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->tablespace('test2')
  )
  ->toEqual('CREATE TABLE test1 TABLESPACE test2');

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

it('can create with no data', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->withNoData()
  )
  ->toEqual('CREATE TABLE test WITH NO DATA');

});