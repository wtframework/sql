# What the Framework?! SQL

## Replace
Use the static `replace` method to create a `REPLACE` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::replace();
```

## Into
See [Insert](insert.md#into) documentation.

## Columns
See [Insert](insert.md#columns) documentation.

## Values
See [Insert](insert.md#values) documentation.

## Set
See [Insert](insert.md#set) documentation.

## Select
See [Insert](insert.md#select) documentation.

## Returning
See [Insert](insert.md#returning) documentation.

## Miscellaneous methods
```php
$stmt->lowPriority();
$stmt->delayed();
$stmt->ignore();
```

## CTEs
See [Select](select.md#ctes) documentation.

## Explain
See [Select](select.md#explain) documentation.

## Set statement
See [Select](select.md#set-statement) documentation.

## When
See [Select](select.md#when) documentation.