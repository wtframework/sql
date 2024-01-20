# What the Framework?! SQL

## Outfile
The `Outfile` service class provides a fluent interface for generating outfiles.
```php
use WTFramework\SQL\SQL;

$outfile = SQL::outfile('/path/to/file');
```

## Character set
```php
$outfile->characterSet('utf8mb4');
```

## Fields
```php
$outfile->fieldsTerminatedBy(',');
$outfile->fieldsEnclosedBy('"');
$outfile->fieldsOptionallyEnclosedBy('"');
$outfile->fieldsEscapedBy('\\');
```

## Lines
```php
$outfile->linesStartingBy('');
$outfile->linesTerminatedBy('\n');
```