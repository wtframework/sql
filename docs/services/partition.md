# What the Framework?! SQL

## Partition
The `Partition` service class provides a fluent interface for generating partitions.
```php
use WTFramework\SQL\SQL;

$partition = SQL::partition('p0');
```

## Values
```php
$partition->valuesLessThan($expression);
$partition->valuesLessThanMaxValue();
$partition->valuesIn($array);
```

## Miscellaneous methods
```php
$partition->engine($engine);
$partition->comment($comment);
$partition->dataDirectory($directory);
$partition->indexDirectory($directory);
$partition->maxRows($int);
$partition->minRows($int);
$partition->tablespace($tablespace);
$partition->nodeGroup($node_group);
```

## Subpartitions
Use the `subpartition` method to add subpartition. A [`Subpartition`](services/subpartition.md) service class can be passed, providing a fluent interface for generating subpartitions.
```php
$partition->subpartition(SQL::subpartition('p0'));
```