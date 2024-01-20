# What the Framework?! SQL

## Column
The `Column` service class provides a fluent interface for generating columns.
```php
use WTFramework\SQL\SQL;

$column = SQL::column('c1');
```
\
The `use` method can be used to change the grammar of the column if it is not using the global grammar.
```php
$column->use(Grammar::MariaDB);
```

## Data types
```php
$column->tinyInt();
$column->smallInt();
$column->mediumInt();
$column->int();
$column->integer();
$column->bigInt();
$column->decimal();
$column->float();
$column->double();
$column->numeric();
$column->real();
$column->bit();
$column->binary();
$column->blob();
$column->char();
$column->enum([1, 2, 3]);
$column->inet4();
$column->inet6();
$column->mediumBlob();
$column->mediumText();
$column->longBlob();
$column->longText();
$column->text();
$column->tinyBlob();
$column->tinyText();
$column->varbinary();
$column->varchar();
$column->set([1, 2, 3]);
$column->uuid();
$column->date();
$column->time();
$column->datetime();
$column->timestamp();
$column->year();
$column->json();
$column->point();
$column->lineString();
$column->polygon();
$column->multiPoint();
$column->multiLineString();
$column->multiPolygon();
$column->geometryCollection();
$column->bigSerial();
$column->varbit();
$column->boolean();
$column->box();
$column->bytea();
$column->cidr();
$column->circle();
$column->interval();
$column->intervalYear();
$column->intervalMonth();
$column->intervalDay();
$column->intervalHour();
$column->intervalMinute();
$column->intervalSecond();
$column->intervalYearToMonth();
$column->intervalDayToHour();
$column->intervalDayToMinute();
$column->intervalDayToSecond();
$column->intervalHourToMinute();
$column->intervalHourToSecond();
$column->intervalMinuteToSecond();
$column->jsonb();
$column->line();
$column->lseg();
$column->macaddr();
$column->macaddr8();
$column->money();
$column->path();
$column->pglsn();
$column->pgSnapshot();
$column->smallSerial();
$column->serial();
$column->timeWithTimeZone();
$column->timestampWithTimeZone();
$column->tsQuery();
$column->tsVector();
$column->xml();
$column->smallMoney();
$column->nchar();
$column->nvarchar();
$column->datetime2();
$column->datetimeOffset();
$column->smallDatetime();
$column->rowVersion();
$column->hierarchyID();
$column->uniqueIdentifer();
$column->sqlVariant();
$column->geometry();
$column->geography();
```

## Length
```php
$column->length($length);
$column->length($precision, $scale)
```

## Foreign keys
Use the `references` method to create a foreign key on the column.
```php
$column->references('t1', 'c1');
```
\
Reference options:
```php
$column->onDeleteSetNull();
$column->onDeleteSetDefault();
$column->onDeleteCascade();
$column->onDeleteRestrict();

$column->onUpdateSetNull();
$column->onUpdateSetDefault();
$column->onUpdateCascade();
$column->onUpdateRestrict();
```
\
Match options:
```php
$column->matchSimple();
$column->matchFull();
```

## Generated
Use the `as` method to create a generated column.
```php
$column->as($expression);
```
\
Generated column options:
```php
$column->virtual();
$column->persistent();
$column->stored();
```
\
Other types of generated columns are also supported:
```php
$column->asRowStart();
$column->asRowEnd();
$column->alwaysAsIdentity($sequence_options);
$column->byDefaultAsIdentity($sequence_options);
```

## Miscellaneous methods
```php
$column->ifNotExists();
$column->ifExists();
$column->signed();
$column->unsigned();
$column->characterSet($character_set);
$column->collate($collation);
$column->notNull();
$column->default($value);
$column->onUpdateCurrentTimestamp($precision);
$column->autoIncrement();
$column->zeroFill();
$column->primaryKey();
$column->unique();
$column->visible();
$column->invisible();
$column->withSystemVersioning();
$column->withoutSystemVersioning();
$column->comment($comment);
$column->refSystemID($id);
$column->first();
$column->after($column);
$column->formatFixed();
$column->formatDynamic();
$column->formatDefault();
$column->engineAttribute($attribute);
$column->secondaryEngineAttribute($attribute);
$column->storageDisk();
$column->storageMemory();
$column->withTimeZone();
$column->withOptions();
$column->compression();
$column->check($expression);
$column->noInherit();
$column->nullsDistinct();
$column->nullsNotDistinct();
$column->deferrable();
$column->deferrableDeferred();
$column->deferrableImmediate();
$column->notDeferrable();
$column->notDeferrableDeferred();
$column->notDeferrableImmediate();
$column->onConflictRollback();
$column->onConflictFail();
$column->onConflictIgnore();
$column->onConflictReplace();
```