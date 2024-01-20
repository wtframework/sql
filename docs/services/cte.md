# What the Framework?! SQL

## CTE
The `CTE` service class provides a fluent interface for generating common table expressions (CTEs).\
\
Pass as the first argument the CTE name and the second argument a `SELECT` statement.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::select()
->from('t1');

$cte = SQL::cte('cte', $stmt);
```

## Columns
See [Select](../select.md#columns) documentation.

## Cycle
```php
$cte->cycle($columns);
$cte->set($column);
$cte->to($value);
$cte->default($value);
$cte->using($column);
```

## Search
```php
$cte->searchBreadth($first_by, $set);
$cte->searchDepth($first_by, $set);
```

## Miscellaneous methods
```php
$cte->cycleRestrict($columns);
$cte->materialized();
$cte->notMaterialized();
```