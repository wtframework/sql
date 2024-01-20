<?php

declare(strict_types=1);

use WTFramework\SQL\Statements\CreateIndex;

it('can create index', function ()
{

  expect((string) new CreateIndex('i0'))
  ->toBe("CREATE INDEX i0");

  expect(
    (string) (new CreateIndex('i0'))
    ->explain()
    ->orReplace()
    ->unique()
    ->clustered()
    ->columnstore()
    ->concurrently()
    ->ifNotExists()
    ->using('BTREE')
    ->on('t1')
    ->column('c1')
    ->wait(1)
    ->keyBlockSize(1)
    ->withParser('parser')
    ->comment('comment')
    ->clustering()
    ->ignored()
    ->visible()
    ->engineAttribute('a')
    ->secondaryEngineAttribute('b')
    ->algorithmCopy()
    ->lockDefault()
    ->include('c1')
    ->nullsDistinct()
    ->with('a')
    ->tablespace('tablespace')
    ->where('c1', 1)
    ->usingXMLIndex('index')
    ->filestreamOn('stream')
    ->if('test')
    ->else('test')
    ->when(true, function ($sql, $condition) {}, function ($sql, $condition) {})
  )
  ->toBe(
    "IF test "
  . "EXPLAIN "
  . "CREATE "
  . "OR REPLACE "
  . "UNIQUE "
  . "CLUSTERED "
  . "COLUMNSTORE "
  . "INDEX "
  . "CONCURRENTLY "
  . "IF NOT EXISTS "
  . "i0 "
  . "USING BTREE "
  . "ON t1 "
  . "(c1) "
  . "WAIT 1 "
  . "KEY_BLOCK_SIZE 1 "
  . "WITH PARSER parser "
  . "COMMENT 'comment' "
  . "CLUSTERING = YES "
  . "IGNORED "
  . "VISIBLE "
  . "ENGINE_ATTRIBUTE 'a' "
  . "SECONDARY_ENGINE_ATTRIBUTE 'b' "
  . "ALGORITHM COPY "
  . "LOCK DEFAULT "
  . "INCLUDE (c1) "
  . "NULLS DISTINCT "
  . "WITH (a) "
  . "TABLESPACE tablespace "
  . "WHERE c1 = 1 "
  . "USING XML INDEX index "
  . "FILESTREAM_ON stream "
  . "ELSE test"
  );

  expect((string) (new CreateIndex('i0'))->fullText())
  ->toBe("CREATE FULLTEXT INDEX i0");

  expect((string) (new CreateIndex('i0'))->xml())
  ->toBe("CREATE XML INDEX i0");

  expect((string) (new CreateIndex('i0'))->spatial())
  ->toBe("CREATE SPATIAL INDEX i0");

});