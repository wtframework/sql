# What the Framework?! SQL

## Create Index
Use the static `createIndex` method to create a `CREATE INDEX` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::createIndex('i1');
```

## On
Use the `on` method to set the table to create the index on.
```php
$stmt->on('t1');
```

## Columns
Use the `column` method to specify the column(s).
```php
$stmt->column('c1');
$stmt->column(['c2', 'c3']);
```

## Miscellaneous methods
```php
$stmt->orReplace();
$stmt->unique();
$stmt->fullText();
$stmt->spatial();
$stmt->ifNotExists();
$stmt->using('BTREE');
$stmt->wait($seconds);
$stmt->noWait();
$stmt->keyBlockSize($int);
$stmt->withParser($name);
$stmt->comment($comment);
$stmt->clustering();
$stmt->noClustering();
$stmt->ignored();
$stmt->notIgnored();
$stmt->algorithmDefault();
$stmt->algorithmInPlace();
$stmt->algorithmCopy();
$stmt->algorithmNoCopy();
$stmt->algorithmInstant();
$stmt->lockDefault();
$stmt->lockNone();
$stmt->lockShared();
$stmt->lockExclusive();
$stmt->visible();
$stmt->invisible();
$stmt->notInvisible();
$stmt->engineAttribute($attribute);
$stmt->secondaryEngineAttribute($attribute);
$stmt->concurrently();
$stmt->include($columns);
$stmt->nullsDistinct();
$stmt->nullsNotDistinct();
$stmt->tablespace($name);
$stmt->xml();
$stmt->primaryXML();
$stmt->clustered();
$stmt->nonClustered();
$stmt->columnstore();
$stmt->usingXMLIndex($name);
$stmt->filestreamOn($name);
```

## With
See [Create Table](create-table.md#with) documentation.

## Where
See [Select](select.md#where) documentation.

## If ... else ...
See [Select](select.md#if--else) documentation.

## When
See [Select](select.md#when) documentation.