# What the Framework?! SQL

## Subpartition
The `Subpartition` service class provides a fluent interface for generating subpartitions.
```php
use WTFramework\SQL\SQL;

$subpartition = SQL::subpartition('sp0');
```

## Miscellaneous methods
```php
$subpartition->engine($engine);
$subpartition->comment($comment);
$subpartition->dataDirectory($directory);
$subpartition->indexDirectory($directory);
$subpartition->maxRows($int);
$subpartition->minRows($int);
$subpartition->tablespace($tablespace);
$subpartition->nodeGroup($node_group);
```