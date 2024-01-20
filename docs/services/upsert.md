# What the Framework?! SQL

## Upsert
The `Upsert` service class provides a fluent interface for generating upserts.
```php
use WTFramework\SQL\SQL;

$upsert = SQL::upsert();
```

## Columns
See [Insert](../insert.md#columns) documentation.

## On constraint
Use the `onConstraint` method to specify the constraint.
```php
$upsert->onConstraint($constraint_name);
```

## Where index
Use the `whereIndex` method to specify the index predicate.
```php
$upsert->whereIndex($index_predicate);
```
\
You may pass a closure to provide a more complex index predicate.
```php
use WTFramework\SQL\Services\Where;

$upsert->whereIndex(fn (Where $where) =>
  $where->where($index_predicate1)
  ->orWhere($index_predicate2);
);
```

## Set
See [Insert](../insert.md#set) documentation.

## Where
See [Select](../select.md#where) documentation.