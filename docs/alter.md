# What the Framework?! SQL

## Alter
Use the static `alter` method to create an `Alter` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::alter();
```
\
You may optionally pass the table name to this method.
```php
$stmt = SQL::alter('t1');
```

## Table
Use the `table` method to set the table name.
```php
$stmt->table('t1');
```

## Rename table
Use the `renameTo` method to rename the table.
```php
$stmt->renameTo('t2');
```

## Add column
Use the `addColumn` method to add a column.
```php
$stmt->addColumn('c1 INT');
```
\
A [`Column`](services/column.md) service class can also be passed, providing a fluent interface for generating columns.
```php
$stmt->addColumn(SQL::column('c1')->int());
```

## Rename column
Use the `renameColumn` method to rename a column.
```php
$stmt->renameColumn('c1', 'c2');
```
\
You may rename multiple columns by passing them as an array with the old names as the keys and the new names as the values.
```php
$stmt->renameColumn([
  'c1' => 'c2',
  'c3' => 'c4',
]);
```

## Alter column
```php
$stmt->columnSetDefault('c1', $value);
$stmt->columnDropDefault('c1');
$stmt->columnSetVisible('c1');
$stmt->columnSetInvisible('c1');
$stmt->columnSetNotNull('c1');
$stmt->columnDropNotNull('c1');
$stmt->columnDropExpression('c1');
$stmt->columnDropExpressionIfExists('c1');
$stmt->columnDropIdentity('c1');
$stmt->columnDropIdentityIfExists('c1');
$stmt->columnSetStatistics('c1', $int);
$stmt->columnSetStoragePlain('c1');
$stmt->columnSetStorageExternal('c1');
$stmt->columnSetStorageExtended('c1');
$stmt->columnSetStorageMain('c1');
$stmt->columnSetCompression('c1', $method);
```

## Change column
Use the `change` or `changeIfExists` methods to change a column definition.
```php
$stmt->change('c1', SQL::column('c1')->int());
```

## Modify column
Use the `modify` method to modify column definition.
```php
$stmt->modify(SQL::column('c1')->int());
```

## Drop column
Use the `dropColumn` method to drop one or more columns.
```php
$stmt->dropColumn('c1');
$stmt->dropColumn(['c1', 'c2']);
```
\
You may also drop columns only if they exist and with cascade.
```php
$stmt->dropColumnIfExists('c1');
$stmt->dropColumnCascade('c1');
$stmt->dropColumnIfExistsCascade('c1');
```

## Add constraint
Use the `addConstraint` method to add a constraint.
```php
$stmt->addConstraint('CONSTRAINT a CHECK (c1 < c2)');
```
\
A [`Constraint`](services/constraint.md) service class can also be passed, providing a fluent interface for generating constraints.
```php
$stmt->addConstraint(SQL::constraint('a')->check('c1 < c2'));
```

## Drop constraint
Use the `dropConstraint` method to drop one or more constraints.
```php
$stmt->dropConstraint('a');
$stmt->dropConstraint(['a', 'b']);
```
\
You may also drop constraints only if they exist and with cascade.
```php
$stmt->dropConstraintIfExists('a');
$stmt->dropConstraintCascade('a');
$stmt->dropConstraintIfExistsCascade('a');
```

## Drop foreign key
Use the `dropForeignKey` or `dropForeignKeyIfExists` methods to drop one or more foreign keys.
```php
$stmt->dropForeignKey('fk1');
$stmt->dropForeignKeyIfExists(['fk1', 'fk2']);
```

## Add index
Use the `addIndex` method to add an index.
```php
$stmt->addIndex('INDEX (c1)');
```
\
An [`Index`](services/index.md) service class can also be passed, providing a fluent interface for generating indexes.
```php
$stmt->addIndex(SQL::index()->column('c1'));
```

## Alter index
```php
$stmt->indexInvisible('i1');
$stmt->indexNotInvisible('i1');
$stmt->indexVisible('i1');
```

## Rename index
Use the `renameIndex` method to rename an index.
```php
$stmt->renameIndex('i1', 'i2');
```
\
You may rename multiple indexes by passing them as an array with the old names as the keys and the new names as the values.
```php
$stmt->renameIndex([
  'i1' => 'i2',
  'i3' => 'i4',
]);
```

## Drop index
Use the `dropIndex` or `dropIndexIfExists` methods to drop one or more indexes.
```php
$stmt->dropIndex('i1');
$stmt->dropIndexIfExists(['i1', 'i2']);
```

## Drop primary key
Use the `dropPrimary` method to drop the primary key.
```php
$stmt->dropPrimaryKey();
```

## Partitions
See [Create Table](create-table.md#partitions) documentation.
```php
$stmt->convertTable('t1', $partition);
$stmt->addPartition($partition);
$stmt->addPartitionIfNotExists($partition);
$stmt->reorganizePartition('p0', $partition);
$stmt->convertPartition('p0', 't2');
$stmt->dropPartition('p0');
$stmt->dropPartitionIfExists('p0');
$stmt->discardPartition('p0');
$stmt->importPartition('p0');
$stmt->truncatePartition('p0');
$stmt->coalescePartition($int);
$stmt->analyzePartition('p0');
$stmt->checkPartition('p0');
$stmt->optimizePartition('p0');
$stmt->rebuildPartition('p0');
$stmt->repairPartition('p0');
$stmt->exchangePartition('p0', 't2');
$stmt->exchangePartitionWithoutValidation('p0', 't2');
$stmt->removePartitioning();
$stmt->attachPartition('p0');
$stmt->detachPartition('p0');
$stmt->detachPartitionConcurrently('p0');
$stmt->detachPartitionFinalize('p0');
```

## Order by
See [Select](select.md#order-by) documentation.

## Miscellaneous methods
```php
$stmt->online();
$stmt->ignore();
$stmt->ifExists();
$stmt->wait($seconds);
$stmt->noWait();
$stmt->allInTablespace();
$stmt->addPeriodForSystemTime($start, $end);
$stmt->convertToCharacterSet('utf8mb4', 'utf8mb4_unicode_ci');
$stmt->force();
$stmt->importTablespace();
$stmt->discardTablespace();
$stmt->enableKeys();
$stmt->disableKeys();
$stmt->addSystemVersioning();
$stmt->dropSystemVersioning();
$stmt->autoExtendSize(1);
$stmt->autoIncrement(1);
$stmt->avgRowLength(1);
$stmt->characterSet('utf8mb4');
$stmt->checksum(true);
$stmt->collate('utf8mb4_unicode_ci');
$stmt->comment('comment');
$stmt->connection('connection');
$stmt->dataDirectory('/path');
$stmt->delayKeyWrite(true);
$stmt->encrypted(true);
$stmt->encryption(true);
$stmt->encryptionKeyID(1);
$stmt->engine('INNODB');
$stmt->engineAttribute('attribute');
$stmt->ietfQuotes(true);
$stmt->indexDirectory('/path');
$stmt->inherits('t2');
$stmt->insertMethodNo();
$stmt->insertMethodFirst();
$stmt->insertMethodLast();
$stmt->keyBlockSize(1);
$stmt->maxRows(10);
$stmt->minRows(10);
$stmt->onCommitDeleteRows();
$stmt->onCommitDrop();
$stmt->of('type');
$stmt->notOf('type');
$stmt->packKeys(true);
$stmt->packKeysDefault();
$stmt->pageChecksum(true);
$stmt->pageCompressed(true);
$stmt->pageCompressionLevel(1);
$stmt->password('password');
$stmt->rowFormatDefault();
$stmt->rowFormatDynamic();
$stmt->rowFormatFixed();
$stmt->rowFormatCompressed();
$stmt->rowFormatRedundant();
$stmt->rowFormatCompact();
$stmt->rowFormatPage();
$stmt->secondaryEngineAttribute('attribute');
$stmt->sequence(true);
$stmt->startTransaction();
$stmt->statsAutoRecalc(true);
$stmt->statsAutoRecalcDefault();
$stmt->statsPersistent(true);
$stmt->statsPersistentDefault();
$stmt->statsSamplePages(1);
$stmt->statsSamplePagesDefault();
$stmt->strict();
$stmt->storageDisk();
$stmt->storageMemory();
$stmt->tablespace('tablespace');
$stmt->transactional(true);
$stmt->union('t2');
$stmt->withoutRowID();
$stmt->withSystemVersioning();
$stmt->periodForSystemTime($start, $end);
$stmt->check($expression);
$stmt->algorithmDefault();
$stmt->algorithmInPlace();
$stmt->algorithmCopy();
$stmt->algorithmNoCopy();
$stmt->algorithmInstant();
$stmt->lockDefault();
$stmt->lockNone();
$stmt->lockShared();
$stmt->lockExclusive();
$stmt->withValidation();
$stmt->withoutValidation();
$stmt->setSchema($name);
$stmt->ownedBy($role);
$stmt->clusterOn('i1');
$stmt->ownerTo($owner);
$stmt->ownerToCurrentRole();
$stmt->ownerToCurrentUser();
$stmt->ownerToSessionUser();
$stmt->replicaIdentityDefault();
$stmt->replicaIdentityUsingIndex();
$stmt->replicaIdentityFull();
$stmt->replicaIdentityNothing();
$stmt->reset($parameters);
$stmt->disableRowLevelSecurity();
$stmt->enableRowLevelSecurity();
$stmt->forceRowLevelSecurity();
$stmt->noForceRowLevelSecurity();
$stmt->enableRule($rule);
$stmt->disableRule($rule);
$stmt->enableReplicaRule($rule);
$stmt->enableAlwaysRule($rule);
$stmt->set($parameter, $value);
$stmt->setAccessMethod($name);
$stmt->setLogged();
$stmt->setUnlogged();
$stmt->setTablespace($name);
$stmt->setTablespaceNoWait($name);
$stmt->setWithoutCluster();
$stmt->enableTrigger($trigger);
$stmt->disableTrigger($trigger);
$stmt->enableReplicaTrigger($trigger);
$stmt->enableAlwaysTrigger($trigger);
$stmt->validateConstraint($constraint);
```

## If ... else ...
See [Select](select.md#if--else) documentation.

## Explain
See [Select](select.md#explain) documentation.

## When
See [Select](select.md#when) documentation.