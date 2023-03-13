<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can rename column', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->renameColumn(
      'test2',
      'test3'
    )
  )
  ->toEqual('ALTER TABLE test1 RENAME COLUMN test2 TO test3');

});

it('can rename multiple columns', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->renameColumn([
      'test2' => 't2',
      'test3' => 't3',
    ])
  )
  ->toEqual(
    'ALTER TABLE test1 RENAME COLUMN test2 TO t2, RENAME COLUMN test3 TO t3'
  );

});

it('can add column string', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addColumn('test2 INT')
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2 INT');

});

it('can add column object', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->alter()
    ->table('test1')
    ->addColumn(
      DBMS::MariaDB->column('test2')
      ->default(1)
    )
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2 DEFAULT (?)');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => PDO::PARAM_STR,
  ]]);

});

it('can add column closure', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addColumn('test2', fn ($c) => $c->int())
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2 INT');

});

it('can add multiple column strings', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addColumn([
      'test2 INT',
      'test3 CHAR'
    ])
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2 INT, ADD COLUMN test3 CHAR');

});

it('can add multiple column objects', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addColumn([
      DBMS::MariaDB->column('test2'),
      DBMS::MariaDB->column('test3'),
    ])
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2, ADD COLUMN test3');

});

it('can add multiple column closures', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addColumn([
      'test2' => fn ($c) => $c->int(),
      'test3' => fn ($c) => $c->char(),
    ])
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2 INT, ADD COLUMN test3 CHAR');

});

it('can add constraint string', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addConstraint('test2')
  )
  ->toEqual('ALTER TABLE test1 ADD test2');

});

it('can add constraint object', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addConstraint(
      DBMS::MariaDB->constraint('test2')
    )
  )
  ->toEqual('ALTER TABLE test1 ADD CONSTRAINT test2');

});

it('can add constraint closure', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addConstraint(fn ($c) => $c->primaryKey())
  )
  ->toEqual('ALTER TABLE test1 ADD PRIMARY KEY');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addConstraint(fn ($c) => $c->primaryKey(), 'test2')
  )
  ->toEqual('ALTER TABLE test1 ADD CONSTRAINT test2 PRIMARY KEY');

});

it('can add multiple constraint strings', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addConstraint([
      'test2',
      'test3'
    ])
  )
  ->toEqual('ALTER TABLE test1 ADD test2, ADD test3');

});

it('can add multiple constraint objects', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addConstraint([
      DBMS::MariaDB->constraint('test2'),
      DBMS::MariaDB->constraint('test3'),
    ])
  )
  ->toEqual('ALTER TABLE test1 ADD CONSTRAINT test2, ADD CONSTRAINT test3');

});

it('can add multiple constraint closures', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addConstraint([
      'test2' => fn ($c) => $c->primaryKey(),
      'test3' => fn ($c) => $c->unique(),
    ])
  )
  ->toEqual(
    'ALTER TABLE test1 ADD CONSTRAINT test2 PRIMARY KEY, '
  . 'ADD CONSTRAINT test3 UNIQUE'
  );

});

it('can add index string', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndex('test2')
  )
  ->toEqual('ALTER TABLE test1 ADD INDEX (test2)');

});

it('can add multiple column index string', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndex(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 ADD INDEX (test2, test3)');

});

it('can add index object', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndex(
      SQL::index('test2')
    )
  )
  ->toEqual('ALTER TABLE test1 ADD INDEX test2');

});

it('can add index closure', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndex(fn ($c) => $c->spatial())
  )
  ->toEqual('ALTER TABLE test1 ADD SPATIAL INDEX');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndex(fn ($c) => $c->spatial(), 'test2')
  )
  ->toEqual('ALTER TABLE test1 ADD SPATIAL INDEX test2');

});

it('can add multiple index strings', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndexes([
      't2' => 'test2',
      ['test3', 'test4']
    ])
  )
  ->toEqual('ALTER TABLE test1 ADD INDEX t2 (test2), ADD INDEX (test3, test4)');

});

it('can add multiple index objects', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndexes([
      SQL::index('test2'),
      SQL::index('test3'),
    ])
  )
  ->toEqual('ALTER TABLE test1 ADD INDEX test2, ADD INDEX test3');

});

it('can add multiple index closures', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->addIndexes([
      'test2' => fn ($c) => $c->spatial(),
      'test3' => fn ($c) => $c->spatial(),
    ])
  )
  ->toEqual(
    'ALTER TABLE test1 ADD SPATIAL INDEX test2, '
  . 'ADD SPATIAL INDEX test3'
  );

});

it('can modify column string', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->modify('test2 INT')
  )
  ->toEqual('ALTER TABLE test1 MODIFY COLUMN test2 INT');

});

it('can modify column object', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->alter()
    ->table('test1')
    ->modify(
      DBMS::MariaDB->column('test2')
      ->default(1)
    )
  )
  ->toEqual('ALTER TABLE test1 MODIFY COLUMN test2 DEFAULT (?)');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => PDO::PARAM_STR,
  ]]);

});

it('can modify column closure', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->modify('test2', fn ($c) => $c->int())
  )
  ->toEqual('ALTER TABLE test1 MODIFY COLUMN test2 INT');

});

it('can modify multiple column strings', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->modify([
      'test2 INT',
      'test3 CHAR'
    ])
  )
  ->toEqual(
    'ALTER TABLE test1 MODIFY COLUMN test2 INT, MODIFY COLUMN test3 CHAR'
    );

});

it('can modify multiple column objects', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->modify([
      DBMS::MariaDB->column('test2'),
      DBMS::MariaDB->column('test3'),
    ])
  )
  ->toEqual('ALTER TABLE test1 MODIFY COLUMN test2, MODIFY COLUMN test3');

});

it('can modify multiple column closures', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->modify([
      'test2' => fn ($c) => $c->int(),
      'test3' => fn ($c) => $c->char(),
    ])
  )
  ->toEqual(
    'ALTER TABLE test1 MODIFY COLUMN test2 INT, MODIFY COLUMN test3 CHAR'
    );

});

it('can change column string', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->change('test2', 'test3')
  )
  ->toEqual('ALTER TABLE test1 CHANGE COLUMN test2 test3');

});

it('can change column object', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->alter()
    ->table('test1')
    ->change(
      'test2',
      DBMS::MariaDB->column('test3')
      ->default(1)
    )
  )
  ->toEqual('ALTER TABLE test1 CHANGE COLUMN test2 test3 DEFAULT (?)');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 1,
    'type' => PDO::PARAM_STR,
  ]]);

});

it('can change column closure', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->change(
      'test2',
      'test3',
      fn ($c) => $c->int()
    )
  )
  ->toEqual('ALTER TABLE test1 CHANGE COLUMN test2 test3 INT');

});

it('can drop column', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumn('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP COLUMN test2');

});

it('can drop multiple columns', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumn(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DROP COLUMN test2, DROP COLUMN test3');

});

it('can drop column if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumnIfExists('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP COLUMN IF EXISTS test2');

});

it('can drop multiple columns if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumnIfExists(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP COLUMN IF EXISTS test2, DROP COLUMN IF EXISTS test3'
  );

});

it('can drop column cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumnCascade('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP COLUMN test2 CASCADE');

});

it('can drop multiple columns cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumnCascade(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP COLUMN test2 CASCADE, DROP COLUMN test3 CASCADE'
  );

});

it('can drop column if exists cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumnIfExistsCascade('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP COLUMN IF EXISTS test2 CASCADE');

});

it('can drop multiple columns if exist cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropColumnIfExistsCascade(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP COLUMN IF EXISTS test2 CASCADE, '
  . 'DROP COLUMN IF EXISTS test3 CASCADE'
  );

});

it('can drop index', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropIndex('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP INDEX test2');

});

it('can drop multiple indexes', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropIndex(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DROP INDEX test2, DROP INDEX test3');

});

it('can drop index if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropIndexIfExists('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP INDEX IF EXISTS test2');

});

it('can drop multiple indexes if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropIndexIfExists(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP INDEX IF EXISTS test2, DROP INDEX IF EXISTS test3'
  );

});

it('can drop foreign key', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropForeignKey('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP FOREIGN KEY test2');

});

it('can drop multiple foreign keys', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropForeignKey(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DROP FOREIGN KEY test2, DROP FOREIGN KEY test3');

});

it('can drop foreign key if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropForeignKeyIfExists('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP FOREIGN KEY IF EXISTS test2');

});

it('can drop multiple foreign keys if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropForeignKeyIfExists(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP FOREIGN KEY IF EXISTS test2, '
  . 'DROP FOREIGN KEY IF EXISTS test3'
  );

});

it('can drop constraint', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraint('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP CONSTRAINT test2');

});

it('can drop multiple constraints', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraint(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DROP CONSTRAINT test2, DROP CONSTRAINT test3');

});

it('can drop constraint if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraintIfExists('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP CONSTRAINT IF EXISTS test2');

});

it('can drop multiple constraints if exists', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraintIfExists(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP CONSTRAINT IF EXISTS test2, DROP CONSTRAINT IF EXISTS test3'
  );

});

it('can drop constraint cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraintCascade('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP CONSTRAINT test2 CASCADE');

});

it('can drop multiple constraints cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraintCascade(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP CONSTRAINT test2 CASCADE, DROP CONSTRAINT test3 CASCADE'
  );

});

it('can drop constraint if exists cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraintIfExistsCascade('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP CONSTRAINT IF EXISTS test2 CASCADE');

});

it('can drop multiple constraints if exists cascade', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropConstraintIfExistsCascade(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DROP CONSTRAINT IF EXISTS test2 CASCADE, '
  . 'DROP CONSTRAINT IF EXISTS test3 CASCADE'
  );

});

it('can enable keys', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->enableKeys()
  )
  ->toEqual('ALTER TABLE test1 ENABLE KEYS');

});

it('can disable keys', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->disableKeys()
  )
  ->toEqual('ALTER TABLE test1 DISABLE KEYS');

});

it('can rename index', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->renameIndex(
      'test2',
      'test3'
    )
  )
  ->toEqual('ALTER TABLE test1 RENAME INDEX test2 TO test3');

});

it('can rename multiple indexes', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->renameIndex([
      'test2' => 't2',
      'test3' => 't3',
    ])
  )
  ->toEqual(
    'ALTER TABLE test1 RENAME INDEX test2 TO t2, RENAME INDEX test3 TO t3'
  );

});

it('can set convert to charset', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->convertToCharset('utf8mb4')
  )
  ->toEqual('ALTER TABLE test1 CONVERT TO CHARACTER SET utf8mb4');

});

it('can set convert to charset with collation', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->convertToCharset(
      'utf8mb4',
      'utf8mb4_520_unicode_ci'
    )
  )
  ->toEqual(
    'ALTER TABLE test1 CONVERT TO CHARACTER SET utf8mb4 '
  . 'COLLATE utf8mb4_520_unicode_ci'
  );

});

it('can import tablespace', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->importTablespace()
  )
  ->toEqual('ALTER TABLE test1 IMPORT TABLESPACE');

});

it('can discard tablespace', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->discardTablespace()
  )
  ->toEqual('ALTER TABLE test1 DISCARD TABLESPACE');

});

it('can set algorithm default', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->algorithmDefault()
  )
  ->toEqual('ALTER TABLE test1 ALGORITHM DEFAULT');

});

it('can set algorithm inplace', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->algorithmInPlace()
  )
  ->toEqual('ALTER TABLE test1 ALGORITHM INPLACE');

});

it('can set algorithm copy', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->algorithmCopy()
  )
  ->toEqual('ALTER TABLE test1 ALGORITHM COPY');

});

it('can set algorithm nocopy', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->algorithmNoCopy()
  )
  ->toEqual('ALTER TABLE test1 ALGORITHM NOCOPY');

});

it('can set algorithm instant', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->algorithmNoInstant()
  )
  ->toEqual('ALTER TABLE test1 ALGORITHM INSTANT');

});

it('can lock default', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->lockDefault()
  )
  ->toEqual('ALTER TABLE test1 LOCK DEFAULT');

});

it('can lock none', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->lockNone()
  )
  ->toEqual('ALTER TABLE test1 LOCK NONE');

});

it('can lock shared', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->lockShared()
  )
  ->toEqual('ALTER TABLE test1 LOCK SHARED');

});

it('can lock exclusive', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->lockExclusive()
  )
  ->toEqual('ALTER TABLE test1 LOCK EXCLUSIVE');

});

it('can set charset', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->charset('utf8mb4')
  )
  ->toEqual('ALTER TABLE test1 CHARACTER SET utf8mb4');

});

it('can set collation', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->collate('utf8mb4_520_unicode_ci')
  )
  ->toEqual('ALTER TABLE test1 COLLATE utf8mb4_520_unicode_ci');

});

it('can set charset and collation', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->charset('utf8mb4')
    ->collate('utf8mb4_520_unicode_ci')
  )
  ->toEqual(
    'ALTER TABLE test1 CHARACTER SET utf8mb4 COLLATE utf8mb4_520_unicode_ci'
  );

});

it('can set checksum on', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->checksum()
  )
  ->toEqual('ALTER TABLE test1 CHECKSUM 1');

});

it('can set checksum off', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->checksum(false)
  )
  ->toEqual('ALTER TABLE test1 CHECKSUM 0');

});

it('can set delay key write on', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->delayKeyWrite()
  )
  ->toEqual('ALTER TABLE test1 DELAY_KEY_WRITE 1');

});

it('can set delay key write off', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->delayKeyWrite(false)
  )
  ->toEqual('ALTER TABLE test1 DELAY_KEY_WRITE 0');

});

it('can set insert method no', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->insertMethodNo()
  )
  ->toEqual('ALTER TABLE test1 INSERT_METHOD NO');

});

it('can set insert method first', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->insertMethodFirst()
  )
  ->toEqual('ALTER TABLE test1 INSERT_METHOD FIRST');

});

it('can set insert method last', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->insertMethodLast()
  )
  ->toEqual('ALTER TABLE test1 INSERT_METHOD LAST');

});

it('can pack keys on', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->packKeys()
  )
  ->toEqual('ALTER TABLE test1 PACK_KEYS 1');

});

it('can pack keys off', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->packKeys(false)
  )
  ->toEqual('ALTER TABLE test1 PACK_KEYS 0');

});

it('can pack keys default', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->packKeysDefault()
  )
  ->toEqual('ALTER TABLE test1 PACK_KEYS DEFAULT');

});

it('can set row format default', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rowFormatDefault()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT DEFAULT');

});

it('can set row format dynamic', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rowFormatDynamic()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT DYNAMIC');

});

it('can set row format fixed', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rowFormatFixed()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT FIXED');

});

it('can set row format compressed', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rowFormatCompressed()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT COMPRESSED');

});

it('can set row format redunant', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rowFormatRedundant()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT REDUNDANT');

});

it('can set row format compact', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rowFormatCompact()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT COMPACT');

});

it('can set row format page', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rowFormatPage()
  )
  ->toEqual('ALTER TABLE test1 ROW_FORMAT PAGE');

});

it('can set stats auto recalc on', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->statsAutoRecalc()
  )
  ->toEqual('ALTER TABLE test1 STATS_AUTO_RECALC 1');

});

it('can set stats auto recalc off', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->statsAutoRecalc(false)
  )
  ->toEqual('ALTER TABLE test1 STATS_AUTO_RECALC 0');

});

it('can set stats auto recalc default', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->statsAutoRecalcDefault()
  )
  ->toEqual('ALTER TABLE test1 STATS_AUTO_RECALC DEFAULT');

});

it('can set stats persistent on', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->statsPersistent()
  )
  ->toEqual('ALTER TABLE test1 STATS_PERSISTENT 1');

});

it('can set stats persistent off', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->statsPersistent(false)
  )
  ->toEqual('ALTER TABLE test1 STATS_PERSISTENT 0');

});

it('can set stats persistent default', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->statsPersistentDefault()
  )
  ->toEqual('ALTER TABLE test1 STATS_PERSISTENT DEFAULT');

});

it('can set transactional on', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->transactional()
  )
  ->toEqual('ALTER TABLE test1 TRANSACTIONAL 1');

});

it('can set transactional off', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->transactional(false)
  )
  ->toEqual('ALTER TABLE test1 TRANSACTIONAL 0');

});

it('can set union', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->union('test2')
  )
  ->toEqual('ALTER TABLE test1 UNION (test2)');

});

it('can set multiple table union', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->union(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 UNION (test2, test3)');

});

it('can order by', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->orderBy('test2')
  )
  ->toEqual('ALTER TABLE test1 ORDER BY test2 ASC');

});

it('can order by desc', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->orderByDesc('test2')
  )
  ->toEqual('ALTER TABLE test1 ORDER BY test2 DESC');

});

it('can drop partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropPartitionIfExists('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP PARTITION IF EXISTS test2');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->dropPartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DROP PARTITION test2, test3');

});

it('can coalesce partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->coalescePartition(1)
  )
  ->toEqual('ALTER TABLE test1 COALESCE PARTITION 1');

});

it('can analyze partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->analyzePartition('test2')
  )
  ->toEqual('ALTER TABLE test1 ANALYZE PARTITION test2');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->analyzePartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 ANALYZE PARTITION test2, test3');

});

it('can check partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->checkPartition('test2')
  )
  ->toEqual('ALTER TABLE test1 CHECK PARTITION test2');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->checkPartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 CHECK PARTITION test2, test3');

});

it('can optimize partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->optimizePartition('test2')
  )
  ->toEqual('ALTER TABLE test1 OPTIMIZE PARTITION test2');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->optimizePartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 OPTIMIZE PARTITION test2, test3');

});

it('can rebuild partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rebuildPartition('test2')
  )
  ->toEqual('ALTER TABLE test1 REBUILD PARTITION test2');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->rebuildPartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 REBUILD PARTITION test2, test3');

});

it('can repair partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->repairPartition('test2')
  )
  ->toEqual('ALTER TABLE test1 REPAIR PARTITION test2');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->repairPartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 REPAIR PARTITION test2, test3');

});

it('can exchange partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->exchangePartition(
      'test2',
      'test3',
    )
  )
  ->toEqual('ALTER TABLE test1 EXCHANGE PARTITION test2 WITH TABLE test3');

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->exchangePartitionWithValidation(
      'test2',
      'test3',
    )
  )
  ->toEqual(
    'ALTER TABLE test1 EXCHANGE PARTITION test2 WITH TABLE test3 WITH VALIDATION'
  );

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->exchangePartitionWithoutValidation(
      'test2',
      'test3',
    )
  )
  ->toEqual(
    'ALTER TABLE test1 EXCHANGE PARTITION test2 WITH TABLE test3 WITHOUT VALIDATION'
  );

});

it('can remove partitioning', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->removePartitioning()
  )
  ->toEqual('ALTER TABLE test1 REMOVE PARTITIONING');

});

it('can truncate partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->truncatePartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 TRUNCATE PARTITION test2, test3');

});

it('can import partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->importPartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 IMPORT PARTITION test2, test3 TABLESPACE');

});

it('can discard partition', function ()
{

  expect(
    (string) DBMS::MariaDB->alter()
    ->table('test1')
    ->discardPartition(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 DISCARD PARTITION test2, test3 TABLESPACE');

});