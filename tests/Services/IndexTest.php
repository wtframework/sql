<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get index', function ()
{

  expect(
    (string) SQL::index('c1', 'i1')
    ->fullText()
    ->ifNotExists()
    ->using('BTREE')
    ->column('c2')
    ->keyBlockSize(1)
    ->withParser('parser')
    ->comment("'comment' comment")
    ->clustering()
    ->ignored()
    ->visible()
    ->engineAttribute('a')
    ->secondaryEngineAttribute('b')
  )
  ->toBe(
    "FULLTEXT "
  . "INDEX "
  . "IF NOT EXISTS "
  . "i1 "
  . "USING BTREE "
  . "(c1, c2) "
  . "KEY_BLOCK_SIZE = 1 "
  . "WITH PARSER parser "
  . "COMMENT = '''comment'' comment' "
  . "CLUSTERING = YES "
  . "IGNORED "
  . "VISIBLE "
  . "ENGINE_ATTRIBUTE = 'a' "
  . "SECONDARY_ENGINE_ATTRIBUTE = 'b'"
  );

  expect((string) SQL::index('c1')->spatial())
  ->toBe("SPATIAL INDEX (c1)");

});