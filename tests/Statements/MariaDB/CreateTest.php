<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MariaDB);

it('can create', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
  )
  ->toEqual('CREATE TABLE test');

});

it('can create or replace', function ()
{

  expect(
    (string) $this->sql->create()
    ->orReplace()
    ->table('test')
  )
  ->toEqual('CREATE OR REPLACE TABLE test');

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

it('can create with period for system time', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->periodForSystemTime(
      'test1',
      'test2'
    )
  )
  ->toEqual('CREATE TABLE test (PERIOD FOR SYSTEM_TIME (test1, test2))');

});

it('can set engine', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->engine('InnoDB')
  )
  ->toEqual('CREATE TABLE test1 ENGINE InnoDB');

});

it('can set auto increment', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->autoIncrement(1)
  )
  ->toEqual('CREATE TABLE test1 AUTO_INCREMENT 1');

});

it('can set avg row length', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->avgRowLength(1)
  )
  ->toEqual('CREATE TABLE test1 AVG_ROW_LENGTH 1');

});

it('can set charset', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->charset('utf8mb4')
  )
  ->toEqual('CREATE TABLE test1 CHARACTER SET utf8mb4');

});

it('can set checksum', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->checksum()
  )
  ->toEqual('CREATE TABLE test1 CHECKSUM 1');

});

it('can set comment', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->comment("test2 'test3'")
  )
  ->toEqual("CREATE TABLE test1 COMMENT 'test2 ''test3'''");

});

it('can set connection', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->connection("test2 'test3'")
  )
  ->toEqual("CREATE TABLE test1 CONNECTION 'test2 ''test3'''");

});

it('can set data directory', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->dataDirectory("test2 'test3'")
  )
  ->toEqual("CREATE TABLE test1 DATA DIRECTORY 'test2 ''test3'''");

});

it('can set delay key write', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->delayKeyWrite()
  )
  ->toEqual('CREATE TABLE test1 DELAY_KEY_WRITE 1');

});

it('can set encrypted on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->encrypted()
  )
  ->toEqual('CREATE TABLE test1 ENCRYPTED YES');

});

it('can set encrypted off', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->encrypted(false)
  )
  ->toEqual('CREATE TABLE test1 ENCRYPTED NO');

});

it('can set encryption key id', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->encryptionKeyID(1)
  )
  ->toEqual('CREATE TABLE test1 ENCRYPTION_KEY_ID 1');

});

it('can set ietf quotes on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->ietfQuotes()
  )
  ->toEqual('CREATE TABLE test1 IETF_QUOTES YES');

});

it('can set ietf quotes off', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->ietfQuotes(false)
  )
  ->toEqual('CREATE TABLE test1 IETF_QUOTES NO');

});

it('can set index directory', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->indexDirectory("test2 'test3'")
  )
  ->toEqual("CREATE TABLE test1 INDEX DIRECTORY 'test2 ''test3'''");

});

it('can set insert method', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->insertMethodNo()
  )
  ->toEqual('CREATE TABLE test1 INSERT_METHOD NO');

});

it('can set key block size', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->keyBlockSize(1)
  )
  ->toEqual('CREATE TABLE test1 KEY_BLOCK_SIZE 1');

});

it('can set max rows', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->maxRows(1)
  )
  ->toEqual('CREATE TABLE test1 MAX_ROWS 1');

});

it('can set min rows', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->minRows(1)
  )
  ->toEqual('CREATE TABLE test1 MIN_ROWS 1');

});

it('can pack keys', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->packKeys()
  )
  ->toEqual('CREATE TABLE test1 PACK_KEYS 1');

});

it('can set page checksum on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->pageChecksum()
  )
  ->toEqual('CREATE TABLE test1 PAGE_CHECKSUM 1');

});

it('can set page checksum off', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->pageChecksum(false)
  )
  ->toEqual('CREATE TABLE test1 PAGE_CHECKSUM 0');

});

it('can set page compressed on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->pageCompressed()
  )
  ->toEqual('CREATE TABLE test1 PAGE_COMPRESSED 1');

});

it('can set page compressed off', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->pageCompressed(false)
  )
  ->toEqual('CREATE TABLE test1 PAGE_COMPRESSED 0');

});

it('can set page compression level', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->pageCompressionLevel(1)
  )
  ->toEqual('CREATE TABLE test1 PAGE_COMPRESSION_LEVEL 1');

});

it('can set password', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->password("test2 'test3'")
  )
  ->toEqual("CREATE TABLE test1 PASSWORD 'test2 ''test3'''");

});

it('can set row format', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->rowFormatDefault()
  )
  ->toEqual('CREATE TABLE test1 ROW_FORMAT DEFAULT');

});

it('can set sequence on', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->sequence()
  )
  ->toEqual('CREATE TABLE test1 SEQUENCE 1');

});

it('can set sequence off', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->sequence(false)
  )
  ->toEqual('CREATE TABLE test1 SEQUENCE 0');

});

it('can set stats auto recalc', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->statsAutoRecalc()
  )
  ->toEqual('CREATE TABLE test1 STATS_AUTO_RECALC 1');

});

it('can set stats persistent', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->statsPersistent()
  )
  ->toEqual('CREATE TABLE test1 STATS_PERSISTENT 1');

});

it('can set stats sample pages', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->statsSamplePages(1)
  )
  ->toEqual('CREATE TABLE test1 STATS_SAMPLE_PAGES 1');

});

it('can set tablespace', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->tablespace('test2')
  )
  ->toEqual('CREATE TABLE test1 TABLESPACE test2');

});

it('can set transactional', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->transactional()
  )
  ->toEqual('CREATE TABLE test1 TRANSACTIONAL 1');

});

it('can set union', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->union('test2')
  )
  ->toEqual('CREATE TABLE test1 UNION (test2)');

});

it('can create with system versioning', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->withSystemVersioning()
  )
  ->toEqual('CREATE TABLE test1 WITH SYSTEM VERSIONING');

});

it('can create like', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test1')
    ->like('test2')
  )
  ->toEqual('CREATE TABLE test1 LIKE test2');

});

it('can create ignore', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->ignore()
  )
  ->toEqual('CREATE TABLE test IGNORE');

});

it('can create replace', function ()
{

  expect(
    (string) $this->sql->create()
    ->table('test')
    ->replace()
  )
  ->toEqual('CREATE TABLE test REPLACE');

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