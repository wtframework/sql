<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MariaDB);

it('can alter', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
  )
  ->toEqual('ALTER TABLE test');

});

it('can alter online', function ()
{

  expect(
    (string) $this->sql->alter()
    ->online()
    ->table('test')
  )
  ->toEqual('ALTER ONLINE TABLE test');

});

it('can alter ignore', function ()
{

  expect(
    (string) $this->sql->alter()
    ->ignore()
    ->table('test')
  )
  ->toEqual('ALTER IGNORE TABLE test');

});

it('can alter if exists', function ()
{

  expect(
    (string) $this->sql->alter()
    ->ifExists()
    ->table('test')
  )
  ->toEqual('ALTER TABLE IF EXISTS test');

});

it('can alter wait', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->wait(10)
  )
  ->toEqual('ALTER TABLE test WAIT 10');

});

it('can alter nowait', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->noWait()
  )
  ->toEqual('ALTER TABLE test NOWAIT');

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

it('can add constraint', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->addConstraint('test2')
  )
  ->toEqual('ALTER TABLE test1 ADD test2');

});

it('can add index', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->addIndex('test2')
  )
  ->toEqual('ALTER TABLE test1 ADD INDEX (test2)');

});

it('can modify column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->modify('test2 INT')
  )
  ->toEqual('ALTER TABLE test1 MODIFY COLUMN test2 INT');

});

it('can change column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->change('test2', 'test3')
  )
  ->toEqual('ALTER TABLE test1 CHANGE COLUMN test2 test3');

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

it('can add period for system time', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->addPeriodForSystemTime('test2', 'test3')
  )
  ->toEqual('ALTER TABLE test1 ADD PERIOD FOR SYSTEM_TIME (test2, test3)');

});

it('can drop primary key', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropPrimaryKey()
  )
  ->toEqual('ALTER TABLE test1 DROP PRIMARY KEY');

});

it('can drop index', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropIndex(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DROP INDEX test2, DROP INDEX test3');

});

it('can drop foreign key', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropForeignKey(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DROP FOREIGN KEY test2, DROP FOREIGN KEY test3');

});

it('can drop constraint', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropConstraint('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP CONSTRAINT test2');

});

it('can enable keys', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableKeys()
  )
  ->toEqual('ALTER TABLE test1 ENABLE KEYS');

});

it('can rename index', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->renameIndex(
      'test2',
      'test3'
    )
  )
  ->toEqual('ALTER TABLE test1 RENAME INDEX test2 TO test3');

});

it('can set convert to charset', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->convertToCharset('utf8mb4')
  )
  ->toEqual('ALTER TABLE test1 CONVERT TO CHARACTER SET utf8mb4');

});

it('can import tablespace', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->importTablespace()
  )
  ->toEqual('ALTER TABLE test1 IMPORT TABLESPACE');

});

it('can force', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->force()
  )
  ->toEqual('ALTER TABLE test1 FORCE');

});

it('can set algorithm', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->algorithmDefault()
  )
  ->toEqual('ALTER TABLE test1 ALGORITHM DEFAULT');

});

it('can lock', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->lockDefault()
  )
  ->toEqual('ALTER TABLE test1 LOCK DEFAULT');

});

it('can alter partitioning', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->removePartitioning()
  )
  ->toEqual('ALTER TABLE test1 REMOVE PARTITIONING');

});

it('can add system versioning', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->addSystemVersioning()
  )
  ->toEqual('ALTER TABLE test1 ADD SYSTEM VERSIONING');

});

it('can drop system versioning', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropSystemVersioning()
  )
  ->toEqual('ALTER TABLE test1 DROP SYSTEM VERSIONING');

});

it('can set engine', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->engine('InnoDB')
  )
  ->toEqual('ALTER TABLE test1 ENGINE InnoDB');

});

it('can set auto increment', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->autoIncrement(1)
  )
  ->toEqual('ALTER TABLE test1 AUTO_INCREMENT 1');

});

it('can set avg row length', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->avgRowLength(1)
  )
  ->toEqual('ALTER TABLE test1 AVG_ROW_LENGTH 1');

});

it('can set charset', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->charset('utf8mb4')
  )
  ->toEqual('ALTER TABLE test1 CHARACTER SET utf8mb4');

});

it('can set checksum', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->checksum()
  )
  ->toEqual('ALTER TABLE test1 CHECKSUM 1');

});

it('can set comment', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->comment("test2 'test3'")
  )
  ->toEqual("ALTER TABLE test1 COMMENT 'test2 ''test3'''");

});

it('can set connection', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->connection("test2 'test3'")
  )
  ->toEqual("ALTER TABLE test1 CONNECTION 'test2 ''test3'''");

});

it('can set data directory', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dataDirectory("test2 'test3'")
  )
  ->toEqual("ALTER TABLE test1 DATA DIRECTORY 'test2 ''test3'''");

});

it('can set delay key write', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->delayKeyWrite()
  )
  ->toEqual('ALTER TABLE test1 DELAY_KEY_WRITE 1');

});

it('can set encrypted on', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->encrypted()
  )
  ->toEqual('ALTER TABLE test1 ENCRYPTED YES');

});

it('can set encrypted off', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->encrypted(false)
  )
  ->toEqual('ALTER TABLE test1 ENCRYPTED NO');

});

it('can set encryption key id', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->encryptionKeyID(1)
  )
  ->toEqual('ALTER TABLE test1 ENCRYPTION_KEY_ID 1');

});

it('can set ietf quotes on', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ietfQuotes()
  )
  ->toEqual('ALTER TABLE test1 IETF_QUOTES YES');

});

it('can set ietf quotes off', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ietfQuotes(false)
  )
  ->toEqual('ALTER TABLE test1 IETF_QUOTES NO');

});

it('can set index directory', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->indexDirectory("test2 'test3'")
  )
  ->toEqual("ALTER TABLE test1 INDEX DIRECTORY 'test2 ''test3'''");

});

it('can set insert method', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->insertMethodNo()
  )
  ->toEqual('ALTER TABLE test1 INSERT_METHOD NO');

});

it('can set key block size', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->keyBlockSize(1)
  )
  ->toEqual('ALTER TABLE test1 KEY_BLOCK_SIZE 1');

});

it('can set max rows', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->maxRows(1)
  )
  ->toEqual('ALTER TABLE test1 MAX_ROWS 1');

});

it('can set min rows', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->minRows(1)
  )
  ->toEqual('ALTER TABLE test1 MIN_ROWS 1');

});

it('can pack keys', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->packKeys()
  )
  ->toEqual('ALTER TABLE test1 PACK_KEYS 1');

});

it('can set page checksum on', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->pageChecksum()
  )
  ->toEqual('ALTER TABLE test1 PAGE_CHECKSUM 1');

});

it('can set page checksum off', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->pageChecksum(false)
  )
  ->toEqual('ALTER TABLE test1 PAGE_CHECKSUM 0');

});

it('can set page compressed on', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->pageCompressed()
  )
  ->toEqual('ALTER TABLE test1 PAGE_COMPRESSED 1');

});

it('can set page compressed off', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->pageCompressed(false)
  )
  ->toEqual('ALTER TABLE test1 PAGE_COMPRESSED 0');

});

it('can set page compression level', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->pageCompressionLevel(1)
  )
  ->toEqual('ALTER TABLE test1 PAGE_COMPRESSION_LEVEL 1');

});

it('can set password', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->password("test2 'test3'")
  )
  ->toEqual("ALTER TABLE test1 PASSWORD 'test2 ''test3'''");

});

it('can set row format', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->rowFormatDefault()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT DEFAULT');

});

it('can set sequence on', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->sequence()
  )
  ->toEqual('ALTER TABLE test1 SEQUENCE 1');

});

it('can set sequence off', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->sequence(false)
  )
  ->toEqual('ALTER TABLE test1 SEQUENCE 0');

});

it('can set stats auto recalc', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->statsAutoRecalc()
  )
  ->toEqual('ALTER TABLE test1 STATS_AUTO_RECALC 1');

});

it('can set stats persistent', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->statsPersistent()
  )
  ->toEqual('ALTER TABLE test1 STATS_PERSISTENT 1');

});

it('can set stats sample pages', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->statsSamplePages(1)
  )
  ->toEqual('ALTER TABLE test1 STATS_SAMPLE_PAGES 1');

});

it('can set tablespace', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->tablespace('test2')
  )
  ->toEqual('ALTER TABLE test1 TABLESPACE test2');

});

it('can set transactional', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->transactional()
  )
  ->toEqual('ALTER TABLE test1 TRANSACTIONAL 1');

});

it('can set union', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->union('test2')
  )
  ->toEqual('ALTER TABLE test1 UNION (test2)');

});

it('can alter with system versioning', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->withSystemVersioning()
  )
  ->toEqual('ALTER TABLE test1 WITH SYSTEM VERSIONING');

});

it('can order by', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->orderBy('test2')
  )
  ->toEqual('ALTER TABLE test1 ORDER BY test2 ASC');

});