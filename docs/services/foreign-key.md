# What the Framework?! SQL

## Foreignkey
The `Foreignkey` service class provides a fluent interface for generating foreign keys.
```php
use WTFramework\SQL\SQL;

$foreign_key = SQL::foreignKey('c1');
```
\
You may optionally add an index name
```php
$foreign_key->index('i1');
```
\
Reference options:
```php
$foreign_key->onDeleteSetNull();
$foreign_key->onDeleteSetDefault();
$foreign_key->onDeleteCascade();
$foreign_key->onDeleteRestrict();

$foreign_key->onUpdateSetNull();
$foreign_key->onUpdateSetDefault();
$foreign_key->onUpdateCascade();
$foreign_key->onUpdateRestrict();
```
\
Match options:
```php
$foreign_key->matchSimple();
$foreign_key->matchFull();
```