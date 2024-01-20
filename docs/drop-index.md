# What the Framework?! SQL

## Drop Index
Use the static `dropIndex` method to create a `DROP INDEX` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::dropIndex('i1');
$stmt = SQL::dropIndex(['i1', 'i2']);
```

## Miscellaneous methods
```php
$stmt->ifExists();
$stmt->on($table);
$stmt->wait($seconds);
$stmt->noWait();
$stmt->concurrently();
$stmt->cascade();

$stmt->algorithmDefault();
$stmt->algorithmInPlace();
$stmt->algorithmCopy();

$stmt->lockDefault();
$stmt->lockNone();
$stmt->lockShared();
$stmt->lockExclusive();
```

## With
See [Create Table](create-table.md#with) documentation.

## If ... else ...
See [Select](select.md#if--else) documentation.

## Explain
See [Select](select.md#explain) documentation.

## When
See [Select](select.md#when) documentation.