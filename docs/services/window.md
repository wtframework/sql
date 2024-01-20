# What the Framework?! SQL

## Window
The `Window` service class provides a fluent interface for generating named window specs.
```php
use WTFramework\SQL\SQL;

$window = SQL::window();
```
\
An optional name can be passed to the `window` method.
```php
$window = SQL::window('w');
```

## Partition by
Use the `partitionBy` method to select the column(s) to partition by.
```php
$window->partitionBy('c1');
$window->partitionBy(['c2', 'c3']);
```

## Order by
See [Select](../select.md#order-by) documentation.

## Frame spec
```php
$window->range();
$window->rows();
$window->groups();

$window->between();

$window->unbounded();
$window->preceding($expression);
$window->currentRow();

$window->betweenUnbounded();
$window->betweenPreceding($expression);
$window->betweenCurrentRow();
$window->betweenFollowing($expression);

$window->andPreceding($expression);
$window->andCurrentRow();
$window->andFollowing($expression);
$window->andUnbounded();

$window->excludeNoOthers();
$window->excludeCurrentRow();
$window->excludeGroup();
$window->excludeTies();
```