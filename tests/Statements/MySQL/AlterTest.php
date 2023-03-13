<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MySQL);

it('can alter', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
  )
  ->toEqual('ALTER TABLE test');

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

it('can set with validation', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->withValidation()
  )
  ->toEqual('ALTER TABLE test1 WITH VALIDATION');

});

it('can set without validation', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->withoutValidation()
  )
  ->toEqual('ALTER TABLE test1 WITHOUT VALIDATION');

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

it('can order by', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->orderBy('test2')
  )
  ->toEqual('ALTER TABLE test1 ORDER BY test2 ASC');

});