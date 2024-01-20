# What the Framework?! SQL

## Index
The `Index` service class provides a fluent interface for generating indexs.
```php
use WTFramework\SQL\SQL;

$index = SQL::index();
```
\
You may optionally pass an index name to this method.
```php
$stmt = SQL::index('i1');
```

## Columns
Use the `column` method to specify the column(s).
```php
$index->column('c1');
$index->column(['c2', 'c3']);
```

## Miscellaneous methods
```php
$index->fullText();
$index->spatial();
$index->ifNotExists();
$index->using('BTREE');
$index->clustering();
$index->noClustering();
$index->keyBlockSize($int);
$index->withParser($name);
$index->comment($comment);
$index->notIgnored();
$index->ignored();
$index->visible();
$index->invisible();
$index->notInvisible();
$index->engineAttribute($attribute);
$index->secondaryEngineAttribute($attribute);
```