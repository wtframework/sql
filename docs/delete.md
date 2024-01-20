# What the Framework?! SQL

## Delete
Use the static `delete` method to create a `DELETE` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::delete();
```

## From
See [Select](select.md#from) documentation.

## Using
Use the `using` method to set the table names to use.
```php
$stmt->using('t1');
$stmt->using(['t1', 't2']);
```
\
As table names are not automatically escaped you may use an alias.
```php
$stmt->using('t1 AS t2');
```
\
If an array of table names is passed then any string key will be used as the alias.
```php
$stmt->using(['t2' => 't1']);
```
\
A [`Table`](services/table.md) service class can also be passed, providing a fluent interface for generating table names.
```php
$stmt->using(SQL::table('t1'));
```

## Table
See [Update](update.md#update) documentation.

## Join
See [Select](select.md#join) documentation.

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
$stmt->quick();
$stmt->ignore();
$stmt->history();
$stmt->forPortionOf($period, $from, $to);
$stmt->beforeSystemTime($time);
$stmt->whereCurrentOf($cursor);
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