# What the Framework?! SQL

## Update
Use the static `update` method to create an `UPDATE` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::update();
```

## Table
Use the `table` method to set the table name.
```php
$stmt->table('t1');
$stmt->table(['t1', 't2']);
```
\
As table names are not automatically escaped you may use an alias.
```php
$stmt->table('t1 AS t2');
```
\
If an array of table names is passed then any string key will be used as the alias.
```php
$stmt->table(['t2' => 't1']);
```
\
A [`Table`](services/table.md) service class can also be passed, providing a fluent interface for generating table names.
```php
$stmt->table(SQL::table('t1'));
```

## Join
See [Select](select.md#join) documentation.

## Set
See [Insert](insert.md#set) documentation.

## From
See [Select](select.md#from) documentation.

## Where
See [Select](select.md#where) documentation.

## Order by
See [Select](select.md#order-by) documentation.

## Limit
See [Select](select.md#limit) documentation.

## Offset
See [Select](select.md#offset) documentation.

## Top
See [Select](select.md#top) documentation.

## Returning
See [Insert](insert.md#returning) documentation.

## Miscellaneous methods
```php
$stmt->lowPriority();
$stmt->ignore();
$stmt->forPortionOf($period, $from, $to);
$stmt->whereCurrentOf($cursor);
$stmt->orReplace();
$stmt->orFail();
$stmt->orIgnore();
$stmt->orRollBack();
```

## CTEs
See [Select](select.md#ctes) documentation.

## If ... else ...
See [Select](select.md#if--else) documentation.

## Explain
See [Select](select.md#explain) documentation.

## Set statement
See [Select](select.md#set-statement) documentation.

## When
See [Select](select.md#when) documentation.