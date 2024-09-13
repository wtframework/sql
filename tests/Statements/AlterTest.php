<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Column;
use WTFramework\SQL\Statements\Alter;

it('can alter', function ()
{

  expect((string) (new Alter))
  ->toBe("ALTER TABLE");

  expect(
    (string) (new Alter)
    ->explain()
    ->online()
    ->ignore()
    ->ifExists()
    ->only()
    ->allInTablespace()
    ->table('test')
    ->setSchema('test')
    ->ownedBy('test')
    ->attachPartition('test')
    ->forValuesDefault()
    ->detachPartition('test')
    ->wait(10)
    ->addIndex('test')
    ->renameColumn('test', 'test')
    ->renameConstraint('test', 'test')
    ->renameIndex('test', 'test')
    ->renameTo('test')
    ->dropColumn('test')
    ->dropConstraint('test')
    ->dropIndex('test')
    ->dropPrimaryKey('test')
    ->dropForeignKey('test')
    ->addPeriodForSystemTime('test', 'test')
    ->algorithmDefault()
    ->columnDropDefault('test')
    ->constraintEnforced('test')
    ->indexInvisible('test')
    ->convertToCharacterSet('test', 'test')
    ->force()
    ->importTablespace()
    ->enableKeys()
    ->lockDefault()
    ->addSystemVersioning()
    ->withValidation()
    ->clusterOn('test')
    ->inherit('test')
    ->notOf()
    ->of('test')
    ->ownerToCurrentRole()
    ->replicaIdentityDefault()
    ->reset('test')
    ->enableRowLevelSecurity()
    ->enableRule('test')
    ->setAccessMethod('test')
    ->setLogged()
    ->setParam('test')
    ->setTablespace('test')
    ->setWithoutCluster()
    ->enableTrigger('test')
    ->validateConstraint('test')
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
    ->storageDisk()
    ->transactional()
    ->union('test')
    ->withSystemVersioning()
    ->convertTable('test', 'test')
    ->addPartition('test')
    ->reorganizePartition()
    ->removePartitioning()
    ->partitionByHash('test')
    ->partitions(1)
    ->subpartitionByHash('test')
    ->subpartitions(2)
    ->orderBy('test')
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toEqual(
    "IF test "
  . "EXPLAIN "
  . "ALTER "
  . "ONLINE "
  . "IGNORE "
  . "TABLE "
  . "IF EXISTS "
  . "ONLY "
  . "ALL IN TABLESPACE "
  . "test "
  . "SET SCHEMA test "
  . "OWNED BY test "
  . "ATTACH PARTITION test "
  . "FOR VALUES DEFAULT "
  . "DETACH PARTITION test "
  . "WAIT 10 "
  . "ADD INDEX (test), "
  . "RENAME COLUMN test TO test, "
  . "RENAME CONSTRAINT test TO test, "
  . "RENAME INDEX test TO test, "
  . "RENAME TO test, "
  . "DROP COLUMN test, "
  . "DROP CONSTRAINT test, "
  . "DROP INDEX test, "
  . "DROP PRIMARY KEY, "
  . "DROP FOREIGN KEY test, "
  . "ADD PERIOD FOR SYSTEM_TIME (test, test), "
  . "ALGORITHM = DEFAULT, "
  . "ALTER COLUMN test DROP DEFAULT, "
  . "ALTER CONSTRAINT test ENFORCED, "
  . "ALTER INDEX test INVISIBLE, "
  . "CONVERT TO CHARACTER SET test COLLATE test, "
  . "FORCE, "
  . "IMPORT TABLESPACE, "
  . "ENABLE KEYS, "
  . "LOCK = DEFAULT, "
  . "ADD SYSTEM VERSIONING, "
  . "WITH VALIDATION, "
  . "CLUSTER ON test, "
  . "INHERIT test, "
  . "NOT OF, "
  . "OF test, "
  . "OWNER TO CURRENT_ROLE, "
  . "REPLICA IDENTITY DEFAULT, "
  . "RESET (test), "
  . "ENABLE ROW LEVEL SECURITY, "
  . "ENABLE RULE test, "
  . "SET ACCESS METHOD test, "
  . "SET LOGGED, "
  . "SET (test), "
  . "SET TABLESPACE test, "
  . "SET WITHOUT CLUSTER, "
  . "ENABLE TRIGGER test, "
  . "VALIDATE CONSTRAINT test, "
  . "AUTOEXTEND_SIZE = 1 "
  . "AUTO_INCREMENT = 1 "
  . "AVG_ROW_LENGTH = 1 "
  . "CHARACTER SET = test "
  . "CHECKSUM = 1 "
  . "COLLATE = test "
  . "COMMENT = 'test ''test''' "
  . "COMPRESSION = 'test' "
  . "CONNECTION = 'test ''test''' "
  . "DATA DIRECTORY = 'test ''test''' "
  . "DELAY_KEY_WRITE = 1 "
  . "ENCRYPTED = YES "
  . "ENCRYPTION = 'Y' "
  . "ENCRYPTION_KEY_ID = 1 "
  . "ENGINE = test "
  . "ENGINE_ATTRIBUTE = 'test' "
  . "IETF_QUOTES = YES "
  . "INDEX DIRECTORY = 'test ''test''' "
  . "INSERT_METHOD = NO "
  . "KEY_BLOCK_SIZE = 1 "
  . "MAX_ROWS = 1 "
  . "MIN_ROWS = 1 "
  . "PACK_KEYS = 1 "
  . "PAGE_CHECKSUM = 1 "
  . "PAGE_COMPRESSED = 1 "
  . "PAGE_COMPRESSION_LEVEL = 1 "
  . "PASSWORD = 'test ''test''' "
  . "ROW_FORMAT = DEFAULT "
  . "SECONDARY_ENGINE_ATTRIBUTE = 'test' "
  . "SEQUENCE = 1 "
  . "START TRANSACTION "
  . "STATS_AUTO_RECALC = 1 "
  . "STATS_PERSISTENT = 1 "
  . "STATS_SAMPLE_PAGES = 1 "
  . "TABLESPACE test "
  . "STORAGE DISK "
  . "TRANSACTIONAL = 1 "
  . "UNION (test) "
  . "WITH SYSTEM VERSIONING "
  . "CONVERT TABLE test TO test "
  . "ADD PARTITION (test) "
  . "REORGANIZE PARTITION "
  . "REMOVE PARTITIONING "
  . "PARTITION BY HASH(test) "
  . "PARTITIONS 1 "
  . "SUBPARTITION BY HASH(test) "
  . "SUBPARTITIONS 2, "
  . "ORDER BY test "
  . "ELSE test"
  );

});

it('can alter with table name', function ()
{

  expect((string) new Alter('test'))
  ->toBe("ALTER TABLE test");

});