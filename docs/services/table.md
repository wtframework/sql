# What the Framework?! SQL

## Table
The `Table` service class provides a fluent interface for generating table names.
```php
use WTFramework\SQL\SQL;

$table = SQL::table('t1');
```

## Columns
See [Insert](../insert.md#columns) documentation.

## Partitions
```php
$table->partition('p0');
$table->partition(['p0', 'p1']);
```

## Index hints
You may optionally pass either a string or an array of strings to specify the index(es).
```php
$table->useIndex();
$table->useIndexForOrderBy();
$table->useIndexForGroupBy();
$table->ignoreIndex();
$table->ignoreIndexForOrderBy();
$table->ignoreIndexForGroupBy();
$table->forceIndex();
$table->forceIndexForOrderBy();
$table->forceIndexForGroupBy();
```

## System-versioned tables
```php
$table->forSystemTimeAll();
$table->forSystemTimeAsOf($time);
$table->forSystemTimeFrom($from, $to);
$table->forSystemTimeBetween($from, $to);
```

## Miscellaneous methods
```php
$table->alias('t2');
$table->only();
$table->indexedBy($index);
$table->notIndexed();
```