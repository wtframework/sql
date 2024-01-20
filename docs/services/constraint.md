# What the Framework?! SQL

## Constraint
The `Constraint` service class provides a fluent interface for generating constraints.
```php
use WTFramework\SQL\SQL;

$index = SQL::constraint();
```
\
You may optionally pass a constraint name to this method.
```php
$stmt = SQL::constraint('a1');
```

## Columns
Use the `column` method to specify the column(s).
```php
$constraint->column('c1');
$constraint->column(['c2', 'c3']);
```

## Foreign keys
Use the `foreignKey` method to define a foreign key.
```php
$constraint->foreignKey();
```

See [Column](column.md#foreign-keys) documentation for further information.

## Miscellaneous methods
```php
$constraint->primaryKey();
$constraint->primaryKeyDesc();
$constraint->unique();
$constraint->ifNotExists();
$constraint->index($name);
$constraint->using('BTREE');
$constraint->keyBlockSize($value);
$constraint->withParser($name);
$constraint->comment($comment);
$constraint->clustering();
$constraint->noClustering();
$constraint->ignored();
$constraint->notIgnored();
$constraint->check($expression);
$constraint->invisible();
$constraint->notInvisible();
$constraint->visible();
$constraint->engineAttribute($attribute);
$constraint->secondaryEngineAttribute($attribute);
$constraint->enforced();
$constraint->notEnforced();
$constraint->noInherit();
$constraint->exclude();
$constraint->nullsDistinct();
$constraint->nullsNotDistinct();
$constraint->include($columns);
$constraint->usingIndexTablespace($tablespace);
$constraint->deferrable();
$constraint->deferrableDeferred();
$constraint->deferrableImmediate();
$constraint->notDeferrable();
$constraint->notDeferrableDeferred();
$constraint->notDeferrableImmediate();
$constraint->notValid();
$constraint->onConflictRollback();
$constraint->onConflictFail();
$constraint->onConflictIgnore();
$constraint->onConflictReplace();
```

## Where
See [Select](../select.md#where) documentation.

## With
Use the `with` method to set any storage parameters.
```php
$stmt->with('fillfactor ', 10);
```
\
You may also pass the parameters as an array.
```php
$stmt->setStatement([
  'fillfactor' => 10,
]);
```