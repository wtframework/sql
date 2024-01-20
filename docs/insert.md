# What the Framework?! SQL

## Insert
Use the static `insert` method to create an `INSERT` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::insert();
```

## Into
Use the `into` method to set the table name.
```php
$stmt->into('t1');
```

## Columns
Use the `column` method to specify the column(s).
```php
$stmt->column('c1');
$stmt->column(['c2', 'c3']);
```

## Values
Use the `values` method to set the values. The values should be ordered according to the table column order, or the order of the columns as passed to the `column` method.
```php
$stmt->values([1, 2, 3]);
```
\
If the value is a string then it will be treated as a bound parameter. You may use `SQL::raw` to avoid this.
```php
$stmt->where([SQL::raw('DEFAULT'), 2, 3]);
```
\
Pass an array of arrays to insert multiple rows.
```php
$stmt->values([
  [1, 2, 3],
  [4, 5, 6],
]);
```

## Set
Use the `set` method to explicity set the value of a column. Pass as the first argument the column and the second argument the value.
```php
$stmt->set('c1', 1);
```
\
You may also pass an array of values with the column name as the key.
```php
$stmt->set([
  'c1' => 1,
  'c2' => 2,
]);
```

## Select
Use the `select` method to insert the resultset of a `SELECT` statement.
```php
$stmt->select(SQL::select()->from('t2'));
```

## Row alias
Use the `rowAlias` method to set the row alias.
```php
$stmt->rowAlias('new');
```
\
You may also pass column aliases as the second argument.
```php
$stmt->rowAlias('new', ['a', 'b', 'c']);
```

## On duplicate key update
Use the `onDuplicateKeyUpdate` method to explicity set the value of a column where a matching row already exists. Pass as the first argument the column and the second argument the value.
```php
$stmt->onDuplicateKeyUpdate('c1', 1);
```
\
You may also pass an array of values with the column name as the key.
```php
$stmt->onDuplicateKeyUpdate([
  'c1' => 1,
  'c2' => 2,
]);
```

## On conflict
Use the `onConflict` method to specify an action to perform if a matching row already exists.
```php
$stmt->onConflict('DO NOTHING');
```
\
An [`Upsert`](services/upsert.md) service class can also be passed, providing a fluent interface for generating upserts.
```php
$stmt->onConflict(SQL::upsert());
```

## Returning
Use the `returning` method to return the inserted column(s). If called with no arguments it will return `*`.
```php
$stmt->returning();
$stmt->returning('c1');
$stmt->returning(['c2', 'c3']);
```

## Miscellaneous methods
```php
$stmt->lowPriority();
$stmt->delayed();
$stmt->highPriority();
$stmt->ignore();
$stmt->overridingSystemValue();
$stmt->overridingUserValue();
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