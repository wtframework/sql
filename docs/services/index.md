# What the Framework?! SQL

## Index
The `Index` service class provides a fluent interface for generating indexes. Pass as the first parameter a string or array of column names
```php
use WTFramework\SQL\SQL;

$index = SQL::index('c1');
```
\
You may optionally pass an index name as the second parameter.
```php
$stmt = SQL::index('c1', 'i1');
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