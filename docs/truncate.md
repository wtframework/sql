# What the Framework?! SQL

## Truncate
Use the static `truncate` method to create a `TRUNCATE` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::truncate();
```

## Table
See [Update](update.md#update) documentation.

## Miscellaneous methods
```php
$stmt->wait($seconds);
$stmt->noWait();
$stmt->only();
$stmt->restartIdentity();
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