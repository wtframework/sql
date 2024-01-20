# What the Framework?! SQL

## Subquery
The `Subquery` service class provides a fluent interface for generating subqueries.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::select()
->from('t1')
->column('COUNT(*)');

$subquery = SQL::subquery($stmt);
```

## Columns
See [Insert](../insert.md#columns) documentation.

## System-versioned tables
See [Table](table.md#system-versioned-tables) documentation.

## Miscellaneous methods
```php
$subquery->alias('c1');
$subquery->all();
$subquery->any();
$subquery->exists();
$subquery->lateral();
```