<?php

declare(strict_types=1);

use WTFramework\SQL\Statements\Create;

it('can create', function ()
{

  expect((string) new Create)
  ->toBe("CREATE TABLE");

  expect(
    (string) (new Create)
    ->explain()
    ->orReplace()
    ->temporary()
    ->ifNotExists()
    ->of('test')
    ->table('t1')
    ->column('c1')
    ->constraint('a')
    ->primaryKey('p1')
    ->unique('u1')
    ->index('c2')
    ->periodForSystemTime('start', 'end')
    ->check('b')
    ->autoExtendSize(1)
    ->autoIncrement(1)
    ->avgRowLength(1)
    ->characterSet('test')
    ->checksum()
    ->collate('test')
    ->comment("test 'test'")
    ->compression('test')
    ->connection("test 'test'")
    ->dataDirectory("test 'test'")
    ->delayKeyWrite()
    ->encrypted()
    ->encryption()
    ->encryptionKeyID(1)
    ->engine('test')
    ->engineAttribute('test')
    ->ietfQuotes()
    ->indexDirectory("test 'test'")
    ->insertMethodNo()
    ->keyBlockSize(1)
    ->maxRows(1)
    ->minRows(1)
    ->packKeys()
    ->pageChecksum()
    ->pageCompressed()
    ->pageCompressionLevel(1)
    ->password("test 'test'")
    ->rowFormatDefault()
    ->secondaryEngineAttribute('test')
    ->sequence()
    ->startTransaction()
    ->statsAutoRecalc()
    ->statsPersistent()
    ->statsSamplePages(1)
    ->tablespace('test')
    ->transactional()
    ->storageDisk()
    ->union('test')
    ->withSystemVersioning()
    ->inherits('test')
    ->forValuesDefault()
    ->partitionByHash('test')
    ->partitions(1)
    ->subpartitionByHash('test')
    ->subpartitions(2)
    ->partition('test')
    ->ignore()
    ->as("SELECT")
    ->like('t2')
    ->using('test')
    ->onCommitDeleteRows()
    ->with('test')
    ->withoutRowID()
    ->strict()
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toEqual(
    "IF test "
  . "EXPLAIN "
  . "CREATE "
  . "OR REPLACE "
  . "TEMPORARY "
  . "TABLE "
  . "IF NOT EXISTS "
  . "t1 "
  . "OF test "
  . "("
  . "c1, "
  . "a, "
  . "PRIMARY KEY (p1), "
  . "UNIQUE (u1), "
  . "INDEX (c2), "
  . "PERIOD FOR SYSTEM_TIME (start, end), "
  . "CHECK (b)"
  . ") "
  . "AUTOEXTEND_SIZE 1 "
  . "AUTO_INCREMENT 1 "
  . "AVG_ROW_LENGTH 1 "
  . "CHARACTER SET test "
  . "CHECKSUM 1 "
  . "COLLATE test "
  . "COMMENT 'test ''test''' "
  . "COMPRESSION 'test' "
  . "CONNECTION 'test ''test''' "
  . "DATA DIRECTORY 'test ''test''' "
  . "DELAY_KEY_WRITE 1 "
  . "ENCRYPTED YES "
  . "ENCRYPTION 'Y' "
  . "ENCRYPTION_KEY_ID 1 "
  . "ENGINE test "
  . "ENGINE_ATTRIBUTE 'test' "
  . "IETF_QUOTES YES "
  . "INDEX DIRECTORY 'test ''test''' "
  . "INSERT_METHOD NO "
  . "KEY_BLOCK_SIZE 1 "
  . "MAX_ROWS 1 "
  . "MIN_ROWS 1 "
  . "PACK_KEYS 1 "
  . "PAGE_CHECKSUM 1 "
  . "PAGE_COMPRESSED 1 "
  . "PAGE_COMPRESSION_LEVEL 1 "
  . "PASSWORD 'test ''test''' "
  . "ROW_FORMAT DEFAULT "
  . "SECONDARY_ENGINE_ATTRIBUTE 'test' "
  . "SEQUENCE 1 "
  . "START TRANSACTION "
  . "STATS_AUTO_RECALC 1 "
  . "STATS_PERSISTENT 1 "
  . "STATS_SAMPLE_PAGES 1 "
  . "STORAGE DISK "
  . "TABLESPACE test "
  . "TRANSACTIONAL 1 "
  . "UNION (test) "
  . "WITH SYSTEM VERSIONING "
  . "INHERITS (test) "
  . "FOR VALUES DEFAULT "
  . "PARTITION BY HASH(test) "
  . "PARTITIONS 1 "
  . "SUBPARTITION BY HASH(test) "
  . "SUBPARTITIONS 2 "
  . "(test) "
  . "IGNORE "
  . "AS SELECT "
  . "LIKE t2 "
  . "USING test "
  . "ON COMMIT DELETE ROWS "
  . "WITH (test) "
  . "WITHOUT ROWID, "
  . "STRICT "
  . "ELSE test"
  );

  expect((string) (new Create)->unlogged())
  ->toBe("CREATE UNLOGGED TABLE");

  expect((string) (new Create)->replace())
  ->toBe("CREATE TABLE REPLACE");

  expect((string) (new Create)->partitionOf('test'))
  ->toBe("CREATE TABLE PARTITION OF test");

});