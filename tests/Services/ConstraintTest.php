<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get constraint', function ()
{

  expect(
    (string) SQL::constraint('a')
    ->noInherit()
    ->primaryKey()
    ->ifNotExists()
    ->index('i0')
    ->nullsDistinct()
    ->using('BTREE')
    ->column('c1')
    ->include('c1')
    ->with('a')
    ->usingIndexTablespace('name')
    ->where('a', 1)
    ->onConflictFail()
    ->references('t1')
    ->matchFull()
    ->onDeleteCascade()
    ->onUpdateCascade()
    ->keyBlockSize(1)
    ->withParser('parser')
    ->comment("'comment' comment")
    ->clustering()
    ->ignored()
    ->visible()
    ->engineAttribute('a')
    ->secondaryEngineAttribute('b')
    ->check('a')
    ->enforced()
    ->deferrable()
    ->notValid()
  )
  ->toBe(
    "CONSTRAINT "
  . "a "
  . "NO INHERIT "
  . "PRIMARY KEY "
  . "IF NOT EXISTS "
  . "i0 "
  . "NULLS DISTINCT "
  . "USING BTREE "
  . "(c1) "
  . "INCLUDE (c1) "
  . "WITH (a) "
  . "USING INDEX TABLESPACE name "
  . "WHERE (a = 1) "
  . "ON CONFLICT FAIL "
  . "REFERENCES t1 "
  . "MATCH FULL "
  . "ON DELETE CASCADE "
  . "ON UPDATE CASCADE "
  . "KEY_BLOCK_SIZE 1 "
  . "WITH PARSER parser "
  . "COMMENT '''comment'' comment' "
  . "CLUSTERING = YES "
  . "IGNORED "
  . "VISIBLE "
  . "ENGINE_ATTRIBUTE 'a' "
  . "SECONDARY_ENGINE_ATTRIBUTE 'b' "
  . "CHECK (a) "
  . "ENFORCED "
  . "DEFERRABLE "
  . "NOT VALID"
  );

  expect((string) SQL::constraint()->unique())
  ->toBe("UNIQUE");

  expect((string) SQL::constraint()->foreignKey())
  ->toBe("FOREIGN KEY");

  expect((string) SQL::constraint()->exclude())
  ->toBe("EXCLUDE");

});