# What the Framework?! SQL

## Drop
Use the static `drop` method to create a `DROP TABLE` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::drop();
```

## Table
See [Update](update.md#update) documentation.

## Miscellaneous methods
```php
$stmt->ifExists();
$stmt->temporary();
$stmt->wait($seconds);
$stmt->noWait();
$stmt->cascade();
```

## If ... else ...
See [Select](select.md#if--else) documentation.

## Explain
See [Select](select.md#explain) documentation.

## Set statement
See [Select](select.md#set-statement) documentation.

## When
See [Select](select.md#when) documentation.