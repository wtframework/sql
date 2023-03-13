<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can add column string', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->column('test2 INT')
  )
  ->toEqual('CREATE TABLE test1 (test2 INT)');

});

it('can add column object', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->create()
    ->table('test1')
    ->column(
      DBMS::MariaDB->column('test2')
      ->default('1')
    )
  )
  ->toEqual('CREATE TABLE test1 (test2 DEFAULT (?))');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can add column closure', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->column('test2', fn ($c) => $c->int())
  )
  ->toEqual('CREATE TABLE test1 (test2 INT)');

});

it('can add multiple column strings', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->column(['test2 INT', 'test3 INTEGER'])
  )
  ->toEqual('CREATE TABLE test1 (test2 INT, test3 INTEGER)');

});

it('can add multiple column objects', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->create()
    ->table('test1')
    ->column([
      DBMS::MariaDB->column('test2')
      ->default(1),
      DBMS::MariaDB->column('test3')
      ->default(2),
    ])
  )
  ->toEqual('CREATE TABLE test1 (test2 DEFAULT (?), test3 DEFAULT (?))');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 2,
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can add multiple column closures', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->column(['test2', 'test3'], fn ($c) => $c->int())
  )
  ->toEqual('CREATE TABLE test1 (test2 INT, test3 INT)');

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->column([
      'test2' => fn ($c) => $c->int(),
      'test3' => fn ($c) => $c->char(),
    ])
  )
  ->toEqual('CREATE TABLE test1 (test2 INT, test3 CHAR)');

});

it('can add index string', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->index('test2')
  )
  ->toEqual('CREATE TABLE test1 (INDEX (test2))');

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->index('test2', 'test3')
  )
  ->toEqual('CREATE TABLE test1 (INDEX test3 (test2))');

});

it('can add multiple column index string', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->index(['test2', 'test3'])
  )
  ->toEqual('CREATE TABLE test1 (INDEX (test2, test3))');

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->index(['test2', 'test3'], 'test4')
  )
  ->toEqual('CREATE TABLE test1 (INDEX test4 (test2, test3))');

});

it('can add index object', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->index(SQL::index('test2'))
  )
  ->toEqual('CREATE TABLE test1 (INDEX test2)');

});

it('can add index closure', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->index(fn ($c) => $c->fullText())
  )
  ->toEqual('CREATE TABLE test1 (FULLTEXT INDEX)');

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->index(fn ($c) => $c->fullText(), 'test2')
  )
  ->toEqual('CREATE TABLE test1 (FULLTEXT INDEX test2)');

});

it('can add multiple index strings', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->indexes([
      't2' => 'test2',
      ['test3', 'test4']
    ])
  )
  ->toEqual('CREATE TABLE test1 (INDEX t2 (test2), INDEX (test3, test4))');

});

it('can add multiple index objects', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->indexes([
      SQL::index('test2'),
      SQL::index('test3'),
    ])
  )
  ->toEqual('CREATE TABLE test1 (INDEX test2, INDEX test3)');

});

it('can add multiple index closures', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->indexes([
      'test1' => fn ($c) => $c->fullText(),
      'test2' => fn ($c) => $c->spatial(),
    ])
  )
  ->toEqual('CREATE TABLE test1 (FULLTEXT INDEX test1, SPATIAL INDEX test2)');

});

it('can add constraint string', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint('test2')
  )
  ->toEqual('CREATE TABLE test1 (test2)');

});

it('can add constraint object', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint(DBMS::MariaDB->constraint('test2'))
  )
  ->toEqual('CREATE TABLE test1 (CONSTRAINT test2)');

});

it('can add constraint closure', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint(fn ($c) => $c->primaryKey())
  )
  ->toEqual('CREATE TABLE test1 (PRIMARY KEY)');

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint(fn ($c) => $c->primaryKey(), 'test2')
  )
  ->toEqual('CREATE TABLE test1 (CONSTRAINT test2 PRIMARY KEY)');

});

it('can add multiple constraint strings', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint(['test2', 'test3'])
  )
  ->toEqual('CREATE TABLE test1 (test2, test3)');

});

it('can add multiple constraint objects', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint([
      DBMS::MariaDB->constraint('test2'),
      DBMS::MariaDB->constraint('test3'),
    ])
  )
  ->toEqual('CREATE TABLE test1 (CONSTRAINT test2, CONSTRAINT test3)');

});

it('can add multiple constraint closures', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint([
      fn ($c) => $c->primaryKey(),
      fn ($c) => $c->unique(),
    ])
  )
  ->toEqual('CREATE TABLE test1 (PRIMARY KEY, UNIQUE)');

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->constraint([
      't2' => fn ($c) => $c->primaryKey(),
      't3' => fn ($c) => $c->unique(),
    ])
  )
  ->toEqual(
    'CREATE TABLE test1 (CONSTRAINT t2 PRIMARY KEY, CONSTRAINT t3 UNIQUE)'
  );

});

it('can set charset', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->charset('utf8mb4')
  )
  ->toEqual('CREATE TABLE test1 CHARACTER SET utf8mb4');

});

it('can set collation', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->collate('utf8mb4_520_unicode_ci')
  )
  ->toEqual('CREATE TABLE test1 COLLATE utf8mb4_520_unicode_ci');

});

it('can set charset and collation', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->charset('utf8mb4')
    ->collate('utf8mb4_520_unicode_ci')
  )
  ->toEqual(
    'CREATE TABLE test1 CHARACTER SET utf8mb4 COLLATE utf8mb4_520_unicode_ci'
  );

});

it('can set checksum on', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->checksum()
  )
  ->toEqual('CREATE TABLE test1 CHECKSUM 1');

});

it('can set checksum off', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->checksum(false)
  )
  ->toEqual('CREATE TABLE test1 CHECKSUM 0');

});

it('can set delay key write on', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->delayKeyWrite()
  )
  ->toEqual('CREATE TABLE test1 DELAY_KEY_WRITE 1');

});

it('can set delay key write off', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->delayKeyWrite(false)
  )
  ->toEqual('CREATE TABLE test1 DELAY_KEY_WRITE 0');

});

it('can set insert method no', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->insertMethodNo()
  )
  ->toEqual('CREATE TABLE test1 INSERT_METHOD NO');

});

it('can set insert method first', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->insertMethodFirst()
  )
  ->toEqual('CREATE TABLE test1 INSERT_METHOD FIRST');

});

it('can set insert method last', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->insertMethodLast()
  )
  ->toEqual('CREATE TABLE test1 INSERT_METHOD LAST');

});

it('can pack keys on', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->packKeys()
  )
  ->toEqual('CREATE TABLE test1 PACK_KEYS 1');

});

it('can pack keys off', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->packKeys(false)
  )
  ->toEqual('CREATE TABLE test1 PACK_KEYS 0');

});

it('can pack keys default', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->packKeysDefault()
  )
  ->toEqual('CREATE TABLE test1 PACK_KEYS DEFAULT');

});

it('can set row format default', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->rowFormatDefault()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT DEFAULT');

});

it('can set row format dynamic', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->rowFormatDynamic()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT DYNAMIC');

});

it('can set row format fixed', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->rowFormatFixed()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT FIXED');

});

it('can set row format compressed', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->rowFormatCompressed()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT COMPRESSED');

});

it('can set row format redunant', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->rowFormatRedundant()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT REDUNDANT');

});

it('can set row format compact', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->rowFormatCompact()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT COMPACT');

});

it('can set row format page', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->rowFormatPage()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT PAGE');

});

it('can set stats auto recalc on', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->statsAutoRecalc()
  )
  ->toEqual('CREATE TABLE test1 STATS_AUTO_RECALC 1');

});

it('can set stats auto recalc off', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->statsAutoRecalc(false)
  )
  ->toEqual('CREATE TABLE test1 STATS_AUTO_RECALC 0');

});

it('can set stats auto recalc default', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->statsAutoRecalcDefault()
  )
  ->toEqual('CREATE TABLE test1 STATS_AUTO_RECALC DEFAULT');

});

it('can set stats persistent on', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->statsPersistent()
  )
  ->toEqual('CREATE TABLE test1 STATS_PERSISTENT 1');

});

it('can set stats persistent off', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->statsPersistent(false)
  )
  ->toEqual('CREATE TABLE test1 STATS_PERSISTENT 0');

});

it('can set stats persistent default', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->statsPersistentDefault()
  )
  ->toEqual('CREATE TABLE test1 STATS_PERSISTENT DEFAULT');

});

it('can set transactional on', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->transactional()
  )
  ->toEqual('CREATE TABLE test1 TRANSACTIONAL 1');

});

it('can set transactional off', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->transactional(false)
  )
  ->toEqual('CREATE TABLE test1 TRANSACTIONAL 0');

});

it('can set union', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->union('test2')
  )
  ->toEqual('CREATE TABLE test1 UNION (test2)');

});

it('can set multiple table union', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->union(['test2', 'test3'])
  )
  ->toEqual('CREATE TABLE test1 UNION (test2, test3)');

});

it('can create as string', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test1')
    ->as('SELECT *')
  )
  ->toEqual('CREATE TABLE test1 AS SELECT *');

});

it('can set create as object', function ()
{

  expect(
    (string) DBMS::MariaDB->create()
    ->table('test')
    ->as(DBMS::MariaDB->select())
  )
  ->toEqual('CREATE TABLE test AS SELECT *');

});