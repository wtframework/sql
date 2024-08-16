# What the Framework?! SQL
This library provides a fluent interface for generating SQL statement strings.

The [DBAL](https://github.com/wtframework/dbal) library extends this library with a wrapper for PDO.

## Installation
```bash
composer require wtframework/sql
```

## Documentation

### Supported grammars
- MariaDB
- MySQL
- PostgreSQL
- SQLite
- TSQL

### Supported statements
- [DELETE](docs/delete.md)
- [INSERT](docs/insert.md)
- [REPLACE](docs/replace.md)
- [SELECT](docs/select.md)
- [TRUNCATE](docs/truncate.md)
- [UPDATE](docs/update.md)
- [ALTER TABLE](docs/alter.md)
- [CREATE TABLE](docs/create.md)
- [CREATE INDEX](docs/create-index.md)
- [DROP TABLE](docs/drop.md)
- [DROP INDEX](docs/drop-index.md)

### Example
```php
use WTFramework\SQL\SQL;

echo $stmt = SQL::select()
->from('users')
->where('email_address', 'admin@example.net');
```
```
SELECT * FROM users WHERE email_address = ?
```
\
After casting the object to a string, like above, the `bindings` method will return an array of bound parameters.
```php
print_r($stmt->bindings());
```
```
Array
(
    [0] => admin@example.net
)
```

### Grammars
The default global grammar is `MySQL`. Use the static `SQL::use` method to change this. This will not apply to any existing statements.
```php
use WTFramework\SQL\Grammar;

$stmt1 = SQL::select();

SQL::use(Grammar::TSQL);

$stmt2 = SQL::select();

// $stmt1 will use MySQL, $stmt2 will use TSQL.
```
\
The `use` method can also be used to override the grammar of an individual statement.
```php
$stmt1->use(Grammar::PostgreSQL);
```

## Extending the library
To extend the library you can use the static `macro` method, passing the new method name and a closure to call. This works for both static and non-static methods. This is available on the `SQL` class as well as all statement and service classes.
```php
use WTFramework\SQL\SQL;

SQL::macro('count', function (string $table)
{

  return static::select()
  ->column('COUNT(*) AS counter')
  ->from($table);

});
```
```php
SQL::count('users');
```