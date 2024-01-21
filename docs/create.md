# What the Framework?! SQL

## Create Table
Use the static `create` method to create a `CREATE TABLE` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::create();
```

## Table
Use the `table` method to set the table name.
```php
$stmt->table('t1');
```

## Columns
Use the `column` method to add a column.
```php
$stmt->column('c1 INT');
```
\
A [`Column`](services/column.md) service class can also be passed, providing a fluent interface for generating columns.
```php
$stmt->column(SQL::column('c1')->int());
```

## Primary key
Use the `primaryKey` method to set the primary key.
```php
$stmt->primaryKey('c1');
```
\
Pass an array for a composite primary key.
```php
$stmt->primaryKey(['c1', 'c2']);
```

## Unique keys
Use the `unique` method to add a unique key.
```php
$stmt->unique('c1');
```
\
Pass an array for a composite unique key.
```php
$stmt->unique(['c1', 'c2']);
```

## Indexes
Use the `index` method to add an index.
```php
$stmt->index('c1');
```
\
Pass an array for a composite index.
```php
$stmt->index(['c1', 'c2']);
```
\
An [`Index`](services/index.md) service class can also be passed, providing a fluent interface for generating indexes.
```php
$stmt->index(SQL::index()->column('c1'));
```

## Constraints
Use the `constraint` method to add a constraint.
```php
$stmt->constraint('CONSTRAINT a PRIMARY KEY (c1)');
```
\
A [`Constraint`](services/constraint.md) service class can also be passed, providing a fluent interface for generating constraints.
```php
$stmt->constraint(SQL::constraint('a')->primaryKey('c1'));
```

## Like
Use the `like` method to create a table using the same definition as another table.
```php
$stmt->like('t2');
```
\
PostgreSQL provides further options when using the `like` method.
```php
$stmt->includingAll();
$stmt->includingComments();
$stmt->includingCompression();
$stmt->includingConstraints();
$stmt->includingDefaults();
$stmt->includingGenerated();
$stmt->includingIdentity();
$stmt->includingIndexes();
$stmt->includingStatistics();
$stmt->includingStorage();

$stmt->excludingAll();
$stmt->excludingComments();
$stmt->excludingCompression();
$stmt->excludingConstraints();
$stmt->excludingDefaults();
$stmt->excludingGenerated();
$stmt->excludingIdentity();
$stmt->excludingIndexes();
$stmt->excludingStatistics();
$stmt->excludingStorage();
```

## As
Use the `select` method to insert data as it is created.
```php
$stmt->select(SQL::select()->from('t2'));
```
\
When using `select` you may also use the `ignore` or `replace` methods to handle any duplicate key errors.
```php
$stmt->ignore();
$stmt->replace();
```

## Partitions
To create a table partition use one of the `partitionBy*` methods.
```php
$stmt->partitionByHash($expression);
$stmt->partitionByLinearHash($expression);
$stmt->partitionByKey($columns);
$stmt->partitionByLinearKey($columns);
$stmt->partitionByRange($expression);
$stmt->partitionByRangeColumns($columns);
$stmt->partitionByList($expression);
$stmt->partitionByListColumns($columns);
```
\
SQL and MySQL partition options:
```php
$stmt->partitions($int);

$stmt->subpartitionByHash($expression);
$stmt->subpartitionByLinearHash($expression);
$stmt->subpartitionByKey($columns);
$stmt->subpartitionByLinearKey($columns);

$stmt->subpartitions($int);
```
\
Use the `partition` method to add partition. A [`Partition`](services/partition.md) service class can be passed, providing a fluent interface for generating partitions.
```php
$stmt->partition(SQL::partition('p0'));
```
\
PostgreSQL partition options:
```php
$stmt->partitionOf('t2');
$stmt->forValuesDefault();
$stmt->forValuesIn($expression);
$stmt->forValues($from, $to);
$stmt->forValuesWith($modulus, $remainder);
```

## Miscellaneous methods
```php
$stmt->orReplace();
$stmt->temporary();
$stmt->ifNotExists();
$stmt->unlogged();

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
```

## With
Use the `with` method to set any storage parameters.
```php
$stmt->with('fillfactor ', 10);
```
\
You may also pass the parameters as an array.
```php
$stmt->setStatement([
  'fillfactor' => 10,
]);
```

## If ... else ...
See [Select](select.md#if--else) documentation.

## Explain
See [Select](select.md#explain) documentation.

## When
See [Select](select.md#when) documentation.