<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\SQL;

it('can get column', function ()
{

  expect(
    (string) SQL::column('c1')
    ->ifNotExists()
    ->int()
    ->length(10)
    ->withTimeZone()
    ->withOptions()
    ->signed()
    ->compression('a')
    ->characterSet('b')
    ->collate('c')
    ->notNull()
    ->noInherit()
    ->default(1)
    ->onUpdateCurrentTimestamp()
    ->onConflictFail()
    ->zeroFill()
    ->asRowStart()
    ->virtual()
    ->identity()
    ->primaryKey()
    ->autoIncrement()
    ->visible()
    ->withSystemVersioning()
    ->comment('d')
    ->formatDefault()
    ->engineAttribute('e')
    ->secondaryEngineAttribute('f')
    ->storageDisk()
    ->refSystemID(2)
    ->nullsDistinct()
    ->references('g')
    ->matchFull()
    ->onDeleteCascade()
    ->onUpdateCascade()
    ->deferrable()
    ->check('h')
    ->first()
  )
  ->toBe(
    "IF NOT EXISTS "
  . "c1 "
  . "INTEGER (10) "
  . "WITH TIME ZONE "
  . "WITH OPTIONS "
  . "SIGNED "
  . "COMPRESSION 'a' "
  . "CHARACTER SET b "
  . "COLLATE c "
  . "NOT NULL "
  . "NO INHERIT "
  . "DEFAULT (1) "
  . "ON UPDATE CURRENT_TIMESTAMP "
  . "ON CONFLICT FAIL "
  . "ZEROFILL "
  . "GENERATED ALWAYS AS ROW START "
  . "VIRTUAL "
  . "IDENTITY (1, 1) "
  . "PRIMARY KEY "
  . "AUTO_INCREMENT "
  . "VISIBLE "
  . "WITH SYSTEM VERSIONING "
  . "COMMENT 'd' "
  . "COLUMN_FORMAT DEFAULT "
  . "ENGINE_ATTRIBUTE 'e' "
  . "SECONDARY_ENGINE_ATTRIBUTE 'f' "
  . "STORAGE DISK "
  . "REF_SYSTEM_ID = 2 "
  . "NULLS DISTINCT "
  . "REFERENCES g "
  . "MATCH FULL "
  . "ON DELETE CASCADE "
  . "ON UPDATE CASCADE "
  . "DEFERRABLE "
  . "CHECK (h) "
  . "FIRST"
  );

  expect((string) SQL::column('a')->ifExists())
  ->toBe("IF EXISTS a");

  expect((string) SQL::column('a')->set([1, 2, 3]))
  ->toBe("a SET (1, 2, 3)");

  expect((string) SQL::column('a')->use(Grammar::SQLite)->autoIncrement())
  ->toBe("a AUTOINCREMENT");

  expect((string) SQL::column('a')->persistent())
  ->toBe("a PERSISTENT");

  expect((string) SQL::column('a')->stored())
  ->toBe("a STORED");

  expect((string) SQL::column('a')->unique())
  ->toBe("a UNIQUE");

  expect((string) SQL::column('a')->after('b'))
  ->toBe("a AFTER b");

});