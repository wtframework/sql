<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can get', function ()
{

  expect(
    (string) DBMS::SQLite->constraint('test')
  )
  ->toEqual('CONSTRAINT test');

});

it('can set if not exists', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->foreignKey()
    ->ifNotExists()
  )
  ->toEqual('FOREIGN KEY IF NOT EXISTS');

});

it('can set not null', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->notNull()
  )
  ->toEqual('NOT NULL');

});

it('can set null', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->isNull()
  )
  ->toEqual('NULL');

});

it('can set unique', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->unique()
  )
  ->toEqual('UNIQUE');

});

it('can set primary key', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->primaryKey()
  )
  ->toEqual('PRIMARY KEY');

});

it('can set primary key desc', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->primaryKeyDesc()
  )
  ->toEqual('PRIMARY KEY DESC');

});

it('can set foreign key', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->foreignKey()
  )
  ->toEqual('FOREIGN KEY');

});

it('can set index name', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->unique()
    ->index('test')
  )
  ->toEqual('UNIQUE test');

});

it('can set using btree', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->unique()
    ->usingBTree()
  )
  ->toEqual('UNIQUE USING BTREE');

});

it('can set using hash', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->unique()
    ->usingHash()
  )
  ->toEqual('UNIQUE USING HASH');

});

it('can set using rtree', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->unique()
    ->usingRTree()
  )
  ->toEqual('UNIQUE USING RTREE');

});

it('can set column', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->column('test2')
  )
  ->toEqual('(test2)');

});

it('can set multiple columns', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->column(['test2', 'test3'])
  )
  ->toEqual('(test2, test3)');

});

it('can set key block size', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->keyBlockSize(1)
  )
  ->toEqual('KEY_BLOCK_SIZE 1');

});

it('can set with parser', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->withParser('test')
  )
  ->toEqual('WITH PARSER test');

});

it('can set comment', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->comment("test 'test'")
  )
  ->toEqual("COMMENT 'test ''test'''");

});

it('can set clustering', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->clustering()
  )
  ->toEqual("CLUSTERING = YES");

});

it('can set no clustering', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->noClustering()
  )
  ->toEqual("CLUSTERING = NO");

});

it('can set ignored', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->ignored()
  )
  ->toEqual("IGNORED");

});

it('can set not ignored', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->notIgnored()
  )
  ->toEqual("NOT IGNORED");

});

it('can set on conflict fail', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onConflictFail()
  )
  ->toEqual('ON CONFLICT FAIL');

});

it('can set on conflict ignore', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onConflictIgnore()
  )
  ->toEqual('ON CONFLICT IGNORE');

});

it('can set on conflict replace', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onConflictReplace()
  )
  ->toEqual('ON CONFLICT REPLACE');

});

it('can set on conflict roll back', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onConflictRollBack()
  )
  ->toEqual('ON CONFLICT ROLLBACK');

});

it('can set auto increment', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->autoIncrement()
  )
  ->toEqual('AUTOINCREMENT');

  expect(
    (string) DBMS::MariaDB->constraint()
    ->autoIncrement()
  )
  ->toEqual('AUTO_INCREMENT');

});

it('can set check string', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->check('test2')
  )
  ->toEqual('CHECK (test2)');

});

it('can set check bound string', function ()
{

  expect(
    (string) $constraint = DBMS::SQLite->constraint()
    ->check(SQL::bind('test'))
  )
  ->toEqual('CHECK (?)');

  expect($constraint->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can set enforced', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->enforced('test2')
  )
  ->toEqual('ENFORCED');

});

it('can set not enforced', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->notEnforced('test2')
  )
  ->toEqual('NOT ENFORCED');

});

it('can set default', function ()
{

  expect(
    (string) $constraint = DBMS::SQLite->constraint()
    ->default('test')
  )
  ->toEqual('DEFAULT (?)');

  expect($constraint->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can set default raw', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->default(SQL::raw('test2'))
  )
  ->toEqual('DEFAULT (test2)');

});

it('can set charset', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->charset('utf8')
  )
  ->toEqual('CHARACTER SET utf8');

});

it('can set collation', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->collate('utf8_unicode_ci')
  )
  ->toEqual('COLLATE utf8_unicode_ci');

});

it('can set references', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->references('test2', 'test3')
  )
  ->toEqual('REFERENCES test2 (test3)');

});

it('can set references multiple columns', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->references('test2', ['test3', 'test4'])
  )
  ->toEqual('REFERENCES test2 (test3, test4)');

});

it('can set on delete set null', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onDeleteSetNull()
  )
  ->toEqual('ON DELETE SET NULL');

});

it('can set on delete set default', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onDeleteSetDefault()
  )
  ->toEqual('ON DELETE SET DEFAULT');

});

it('can set on delete set on delete cascade', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onDeleteCascade()
  )
  ->toEqual('ON DELETE CASCADE');

});

it('can set on delete restrict', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onDeleteRestrict()
  )
  ->toEqual('ON DELETE RESTRICT');

});

it('can set on update set null', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onUpdateSetNull()
  )
  ->toEqual('ON UPDATE SET NULL');

});

it('can set on update set default', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onUpdateSetDefault()
  )
  ->toEqual('ON UPDATE SET DEFAULT');

});

it('can set on update cascade', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onUpdateCascade()
  )
  ->toEqual('ON UPDATE CASCADE');

});

it('can set on update restrict', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->onUpdateRestrict()
  )
  ->toEqual('ON UPDATE RESTRICT');

});

it('can set deferrable initially deferred', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->deferrableInitiallyDeferred()
  )
  ->toEqual('DEFERRABLE INITIALLY DEFERRED');

});

it('can set deferrable initially immediate', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->deferrableInitiallyImmediate()
  )
  ->toEqual('DEFERRABLE INITIALLY IMMEDIATE');

});

it('can set not deferrable', function ()
{

  expect(
    (string) DBMS::SQLite->constraint()
    ->notDeferrable()
  )
  ->toEqual('NOT DEFERRABLE');

});

it('can set generated always', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->generatedAlways('test2')
  )
  ->toEqual('test GENERATED ALWAYS AS (test2)');

});

it('can set generated always stored', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->generatedAlways('test2')
    ->stored()
  )
  ->toEqual('test GENERATED ALWAYS AS (test2) STORED');

});

it('can set generated persistent', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->generatedAlways('test2')
    ->persistent()
  )
  ->toEqual('test GENERATED ALWAYS AS (test2) PERSISTENT');

});

it('can set generated always row start', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->generatedAlways()
    ->rowStart()
  )
  ->toEqual('test GENERATED ALWAYS AS ROW START');

});

it('can set generated always row end', function ()
{

  expect(
    (string) DBMS::MariaDB->column('test')
    ->generatedAlways()
    ->rowEnd()
  )
  ->toEqual('test GENERATED ALWAYS AS ROW END');

});

it('can set generated always bound value', function ()
{

  expect(
    (string) $column = DBMS::MariaDB->column('test')
    ->generatedAlways(SQL::bind('test'))
  )
  ->toEqual('test GENERATED ALWAYS AS (?)');

  expect($column->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ]]);

});