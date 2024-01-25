# What the Framework?! SQL

## Select
Use the static `select` method to create a `SELECT` statement builder.
```php
use WTFramework\SQL\SQL;

$stmt = SQL::select();
```

## From
Use the `from` method to set the table name.
```php
$stmt->from('t1');
$stmt->from(['t1', 't2']);
```
\
As table names are not automatically escaped you may use an alias.
```php
$stmt->from('t1 AS t2');
```
\
If an array of table names is passed then any string key will be used as the alias.
```php
$stmt->from(['t2' => 't1']);
```
\
A [`Table`](services/table.md) service class can also be passed, providing a fluent interface for generating table names.
```php
$stmt->from(SQL::table('t1'));
```

## Columns
By default the `SELECT` statement will select `*`. You may use the `column` method to specify the column(s).
```php
$stmt->column('c1');
$stmt->column(['c2', 'c3']);
```
\
As columns are not automatically escaped you may use an alias.
```php
$stmt->column('c1 AS c2');
```
\
If an array of columns is passed then any string key will be used as the alias.
```php
$stmt->column(['c2' => 'c1']);
```
\
A [`Subquery`](services/subquery.md) service class can also be passed, providing a fluent interface for generating subqueries.
```php
$subquery = SQL::subquery("SELECT COUNT(*) FROM t1");

$stmt = SQL::select()
->from('t1')
->column($subquery);
```
\
Use the `distinct` method to select distinct columns
```php
$stmt->distinct();
```

## Join
Use the `join` method to `INNER JOIN` one or more tables.
```php
$stmt->join('t2');
$stmt->join(['t2', 't3']);
```
\
To join `USING` one or more columns, pass them as the second argument.
```php
$stmt->join('t2', 'c1');
$stmt->join('t2', ['c1', 'c2']);
```
\
To join `ON` two columns, pass as arguments the first column, the comparison operator, and the second column.
```php
$stmt->join('t2', 't1.c1', '=', 't2.c1');
```
\
If the comparison to use is `=` then it may be omitted.
```php
$stmt->join('t2', 't1.c1', 't2.c1');
```
\
You may pass as the second argument a closure for more complex join conditions.
```php
use WTFramework\SQL\Services\On;

$stmt->join('t2', fn (On $on) =>
  $on->on('t1.c1', 't2.c1')
  ->on('t1.c2', 't2.c2');
);
```
\
The `On` class provides a number of helpful methods.
```php
$on->on(...$args);
$on->orOn(...$args);
$on->onNot(...$args);
$on->orOnNot(...$args);

$on->onExists($subquery);
$on->orOnExists($subquery);
$on->onNotExists($subquery);
$on->orOnNotExists($subquery);
```
\
Other join types are also possible, all of which work the same as the `join` method.
```php
$stmt->leftJoin(...$args);
$stmt->rightJoin(...$args);
$stmt->fullJoin(...$args);
$stmt->crossJoin(...$args);
$stmt->straightJoin(...$args);
```
\
For natural joins, only the table name(s) can be passed.
```php
$stmt->naturalJoin('t2');
$stmt->naturalLeftJoin('t2');
$stmt->naturalRightJoin('t2');
$stmt->naturalFullJoin('t2');
```

## Where
Use the `where` method to add a `WHERE` clause. Pass as arguments the column, the comparison operator, and the value.
```php
$stmt->where('c1', '=', 1);
```
\
If the comparison to use is `=` then it may be omitted.
```php
$stmt->where('c1', 1);
```
\
If the comparison operator is omitted and the second argument is an array then an `IN` comparison will be used.
```php
$stmt->where('c1', [1, 2]);
```
\
If the comparison operator is omitted and the second argument is `NULL` then an `IS NULL` comparison will be used.
```php
$stmt->where('c1', null);
```
\
If the comparison operator is `BETWEEN` then the third argument must be an array of two elements.
```php
$stmt->where('c1', 'BETWEEN', [1, 3]);
```
\
If the value argument is a string then it will be treated as a bound parameter. You may use `SQL::raw` to avoid this.
```php
$stmt->where('c1', SQL::raw('c2'));
```
\
To treat the first argument as a bound parameter then you may use `SQL::bind`.
```php
$stmt->where(SQL::bind('example'), 'example');
```
\
You may pass as the only argument a closure for a more complex `WHERE` clause.
```php
use WTFramework\SQL\Services\Where;

$stmt->where('c1', 1)
->where(fn (Where $where) =>
  $where->where('c2', 2)
  ->orWhere('c3', 3);
);
```
\
Other `WHERE` types are also possible.
```php
$stmt->orWhere(...$args);
$stmt->whereNot(...$args);
$stmt->orWhereNot(...$args);

$stmt->whereExists($subquery);
$stmt->orWhereExists($subquery);
$stmt->whereNotExists($subquery);
$stmt->orWhereNotExists($subquery);
```

## Group by
Use the `groupBy` method to group by one or more columns in ascending order.
```php
$stmt->groupBy('c1');
$stmt->groupBy(['c1', 'c2']);
```
\
Use the `groupByDesc` method to group by one or more columns in descending order.
```php
$stmt->groupByDesc('c1');
```
\
Use the `withRollup` method to add a super-aggregate row.
```php
$stmt->withRollup();
```

## Having
Use the `having` method to add a `HAVING` clause. Pass as arguments the column, the comparison operator, and the value.
```php
$stmt->having('c1', '=', 1);
```
\
If the comparison to use is `=` then it may be omitted.
```php
$stmt->having('c1', 1);
```
\
If the comparison operator is omitted and the second argument is an array then an `IN` comparison will be used.
```php
$stmt->having('c1', [1, 2]);
```
\
If the comparison operator is omitted and the second argument is `NULL` then an `IS NULL` comparison will be used.
```php
$stmt->having('c1', null);
```
\
If the comparison operator is `BETWEEN` then the third argument must be an array of two elements.
```php
$stmt->having('c1', 'BETWEEN', [1, 3]);
```
\
If the value argument is a string then it will be treated as a bound parameter. You may use `SQL::raw` to avoid this.
```php
$stmt->having('c1', SQL::raw('c2'));
```
\
To treat the first argument as a bound parameter then you may use `SQL::bind`.
```php
$stmt->having(SQL::bind('example'), 'example');
```
\
You may pass as the only argument a closure for a more complex `HAVING` clause.
```php
use WTFramework\SQL\Services\Having;

$stmt->having('c1', 1)
->having(fn (Having $having) =>
  $having->having('c2', 2)
  ->orHaving('c3', 3);
);
```
\
Other `HAVING` types are also possible.
```php
$stmt->orHaving(...$args);
$stmt->havingNot(...$args);
$stmt->orHavingNot(...$args);

$stmt->havingExists($subquery);
$stmt->orHavingExists($subquery);
$stmt->havingNotExists($subquery);
$stmt->orHavingNotExists($subquery);
```

## Window
Use the `window` method to define a named window. Pass the name as the first argument and the spec as the second argument.
```php
$stmt->window('w', 'ORDER BY c1');
```
\
An array of windows can also be passed.
```php
$stmt->window([
  'w1' => 'ORDER BY c1',
  'w2' => 'ORDER BY c2',
])'
```
\
A [`Window`](services/window.md) service class can also be passed, providing a fluent interface for generating window specs.
```php
$stmt->window('w', SQL::window()->orderBy('c1'));
```

## Union
```php
$stmt->union(SQL::select()->from('t2'));
$stmt->unionAll(SQL::select()->from('t2'));
```

## Intersect
```php
$stmt->intersect(SQL::select()->from('t2'));
$stmt->intersectAll(SQL::select()->from('t2'));
```

## Except
```php
$stmt->except(SQL::select()->from('t2'));
$stmt->exceptAll(SQL::select()->from('t2'));
```

## Order by
Use the `orderBy` method to order by one or more columns in ascending order.
```php
$stmt->orderBy('c1');
$stmt->orderBy(['c1', 'c2']);
```
\
Use the `orderByDesc` method to order by one or more columns in descending order.
```php
$stmt->orderByDesc('c1');
```
\
Use the `orderByNullsFirst` method to order by one or more columns in ascending order with nulls first.
```php
$stmt->orderByNullsFirst('c1');
```
\
Use the `orderByNullsLast` method to order by one or more columns in ascending order with nulls last.
```php
$stmt->orderByNullsLast('c1');
```
\
Use the `orderByDescNullsFirst` method to order by one or more columns in descending order with nulls first.
```php
$stmt->orderByDescNullsFirst('c1');
```
\
Use the `orderByDescNullsLast` method to order by one or more columns in descending order with nulls last.
```php
$stmt->orderByDescNullsLast('c1');
```
\
Use the `orderByUsing` method to order by one or more columns using a defined operator.
```php
$stmt->orderByUsing('c1', '<');
```
\
Use the `orderByUsingNullsFirst` method to order by one or more columns using a defined operator with nulls first.
```php
$stmt->orderByUsingNullsFirst('c1', '<');
```
\
Use the `orderByUsingNullsLast` method to order by one or more columns using a defined operator with nulls last.
```php
$stmt->orderByUsingNullsLast('c1', '<');
```

## Limit
Use the `limit` method to limit the number of rows.
```php
$stmt->limit($row_count);
```

## Offset
Use the `offset` method to set the row offset.
```php
$stmt->offset($offset);
```

## Rows examined
Use the `rowsExamined` method to limit the number of rows examined.
```php
$stmt->rowsExamined($row_count);
```

## Fetch rows
Use the `fetchRow` methods to limit the number of rows.
```php
$stmt->fetchRows($row_count);
$stmt->fetchRowsWithTies($row_count);
```

## Offset rows
Use the `offsetRows` method to set the row offset.
```php
$stmt->offsetRows($offset);
```

## Top
Use the `top` methods to limit the number of rows.
```php
$stmt->top($row_count);
$stmt->topWithTies($row_count);
$stmt->topPercent($percentage);
$stmt->topPercentWithTies($percentage);
```

## Into
Use the `intoVar` method to `SELECT ... INTO ... @var`.
```php
$stmt->intoVar('var1');
$stmt->intoVar(['var1', 'var2']);
```
\
Use the `intoDumpfile` method to `SELECT ... INTO ... DUMPFILE`.
```php
$stmt->intoDumpfile('/path/to/file');
```
\
Use the `intoOutfile` method to `SELECT ... INTO ... OUTFILE`.
```php
$stmt->intoOutfile('/path/to/file');
```
\
An [`Outfile`](services/outfile.md) service class can also be passed, providing a fluent interface for generating outfiles.
```php
$stmt->intoOutfile(SQL::outfile('/path/to/file'));
```
\
Use the `into` method to `SELECT INTO ... table`.
```php
$stmt->into('t2');
```

## Values
See [Insert](insert.md#values) documentation.

## Miscellaneous methods
```php
$stmt->highPriority();
$stmt->straightJoinAll();
$stmt->sqlSmallResult();
$stmt->sqlBigResult();
$stmt->sqlBufferResult();
$stmt->sqlCache();
$stmt->sqlNoCache();
$stmt->sqlCalcFoundRows();
$stmt->procedureAnalyse($max_elements, $max_memory);
$stmt->whereCurrentOf($cursor);
```

## CTEs
Use the `with` method to define one or more common table expressions (CTEs) to be used for the statement.
```php
$stmt->with($cte);
$stmt->with([$cte1, $cte2]);
```
\
Use the `withRecursive` method to use recursive CTEs.
```php
$stmt->withRecursive($cte);
```
\
A [`CTE`](services/cte.md) service class can also be passed, providing a fluent interface for generating CTEs.
```php
$stmt->with(SQL::cte('cte', SQL::select()->from('t2')));
```

## If ... else ...
SQLServer allows the use of the `if` method to only execute the statement if a condition is satisfied. Pass as arguments the first expression, the comparison operator, and the second expression.
```php
$stmt->if('DATENAME(weekday, GETDATE())', '=', 'Sunday');
```
\
Use the `else` method to execute an alternative statement if the condition given in the `if` method is not satisfied. Pass as the only argument a `SELECT` statement.
```php
$stmt->else(SQL::select()->from('t2'));
```

## Row-level locking
```php
$stmt->forUpdate();
$stmt->forUpdate($tables);
$stmt->forUpdateWait($seconds);
$stmt->forUpdateNoWait();
$stmt->forUpdateNoWait($tables);
$stmt->forUpdateSkipLocked();
$stmt->forUpdateSkipLocked($tables);

$stmt->forNoKeyUpdate();
$stmt->forNoKeyUpdate($tables);
$stmt->forNoKeyUpdateNoWait();
$stmt->forNoKeyUpdateNoWait($tables);
$stmt->forNoKeyUpdateSkipLocked();
$stmt->forNoKeyUpdateSkipLocked($tables);

$stmt->forShare();
$stmt->forShare($tables);
$stmt->forShareNoWait();
$stmt->forShareNoWait($tables);
$stmt->forShareSkipLocked();
$stmt->forShareSkipLocked($tables);

$stmt->forKeyShare();
$stmt->forKeyShare($tables);
$stmt->forKeyShareNoWait();
$stmt->forKeyShareNoWait($tables);
$stmt->forKeyShareSkipLocked();
$stmt->forKeyShareSkipLocked($tables);

$stmt->lockInShareMode();
$stmt->lockInShareModeWait($seconds);
$stmt->lockInShareModeNoWait();
$stmt->lockInShareModeSkipLocked();
```

## Explain
```php
$stmt->explain();
$stmt->explainQueryPlan();
$stmt->explainExtended();
$stmt->explainPartitions();
$stmt->explainFormatJSON();
$stmt->analyze();
$stmt->analyzeFormatJSON();
```

## Set statement
Use the `setStatement` method to set any system variables for the statement.
```php
$stmt->setStatement('max_statement_time', 1000);
```
\
You may also pass the variables as an array.
```php
$stmt->setStatement([
  'max_statement_time' => 1000,
]);
```

## To Subquery
Use the `toSubquery` method to convert the `SELECT` statement builder into a [`Subquery`](services/subquery.md) service class.
```php
$subquery = SQL::select()
->column('COUNT(*)')
->from('t1')
->toSubquery();
```

## When
Use the `when` method to conditionally add clauses. Pass as the first argument the condition, as the optional second argument the closure to run if the condition is truthy, and as the optional third argument the closure to run if the condition is falsy.
```php
$stmt->when(
  condition: $id,
  if_true: function ($stmt, $id)
  {
    $stmt->where('c1', $id);
  },
  if_false: function ($stmt, $id)
  {
    $stmt->where('c1', null);
  },
);
```