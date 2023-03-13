<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

it('can set as tinyint', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->tinyInt()
  )
  ->toEqual('test TINYINT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->tinyInt(1)
  )
  ->toEqual('test TINYINT (1)');

});

it('can set as smallint', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->smallInt()
  )
  ->toEqual('test SMALLINT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->smallInt(1)
  )
  ->toEqual('test SMALLINT (1)');

});

it('can set as mediumint', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->mediumInt()
  )
  ->toEqual('test MEDIUMINT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->mediumInt(1)
  )
  ->toEqual('test MEDIUMINT (1)');

});

it('can set as int', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->int()
  )
  ->toEqual('test INT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->int(1)
  )
  ->toEqual('test INT (1)');

});

it('can set as bigint', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->bigInt()
  )
  ->toEqual('test BIGINT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->bigInt(1)
  )
  ->toEqual('test BIGINT (1)');

});

it('can set as decimal', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->decimal()
  )
  ->toEqual('test DECIMAL');

  expect(
    (string) DBMS::SQLite->column('test')
    ->decimal(2, 1)
  )
  ->toEqual('test DECIMAL (2, 1)');

});

it('can set as float', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->float()
  )
  ->toEqual('test FLOAT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->float(2, 1)
  )
  ->toEqual('test FLOAT (2, 1)');

});

it('can set as double', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->double()
  )
  ->toEqual('test DOUBLE PRECISION');

  expect(
    (string) DBMS::SQLite->column('test')
    ->double(2, 1)
  )
  ->toEqual('test DOUBLE PRECISION (2, 1)');

});

it('can set as bit', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->bit()
  )
  ->toEqual('test BIT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->bit(1)
  )
  ->toEqual('test BIT (1)');

});

it('can set as binary', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->binary(1)
  )
  ->toEqual('test BINARY (1)');

});

it('can set as blob', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->blob()
  )
  ->toEqual('test BLOB');

  expect(
    (string) DBMS::SQLite->column('test')
    ->blob(1)
  )
  ->toEqual('test BLOB (1)');

});

it('can set as char', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->char()
  )
  ->toEqual('test CHAR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->char(1)
  )
  ->toEqual('test CHAR (1)');

});

it('can set as enum', function ()
{

  expect(
    (string) $column = DBMS::SQLite->column('test')
    ->enum(['test1', 'test2'])
  )
  ->toEqual('test ENUM (?, ?)');

  expect($column->bindings())
  ->toEqual([[
    'value' => 'test1',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can set as inet4', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->inet4()
  )
  ->toEqual('test INET4');

});

it('can set as inet6', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->inet6()
  )
  ->toEqual('test INET6');

});

it('can set as mediumblob', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->mediumBlob()
  )
  ->toEqual('test MEDIUMBLOB');

});

it('can set as mediumtext', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->mediumText()
  )
  ->toEqual('test MEDIUMTEXT');

});

it('can set as longblob', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->longBlob()
  )
  ->toEqual('test LONGBLOB');

});

it('can set as longtext', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->longText()
  )
  ->toEqual('test LONGTEXT');

});

it('can set as text', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->text()
  )
  ->toEqual('test TEXT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->text(1)
  )
  ->toEqual('test TEXT (1)');

});

it('can set as tinyblob', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->tinyBlob()
  )
  ->toEqual('test TINYBLOB');

});

it('can set as tinytext', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->tinyText()
  )
  ->toEqual('test TINYTEXT');

});

it('can set as varbinary', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->varbinary()
  )
  ->toEqual('test VARBINARY');

  expect(
    (string) DBMS::SQLite->column('test')
    ->varbinary(1)
  )
  ->toEqual('test VARBINARY (1)');

});

it('can set as varchar', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->varchar()
  )
  ->toEqual('test VARCHAR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->varchar(1)
  )
  ->toEqual('test VARCHAR (1)');

});

it('can set as set', function ()
{

  expect(
    (string) $column = DBMS::SQLite->column('test')
    ->set(['test1', 'test2'])
  )
  ->toEqual('test SET (?, ?)');

  expect($column->bindings())
  ->toEqual([[
    'value' => 'test1',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can set as uuid', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->uuid()
  )
  ->toEqual('test UUID');

});

it('can set as date', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->date()
  )
  ->toEqual('test DATE');

});

it('can set as time', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->time()
  )
  ->toEqual('test TIME');

  expect(
    (string) DBMS::SQLite->column('test')
    ->time(1)
  )
  ->toEqual('test TIME (1)');

});

it('can set as datetime', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->datetime()
  )
  ->toEqual('test DATETIME');

  expect(
    (string) DBMS::SQLite->column('test')
    ->datetime(1)
  )
  ->toEqual('test DATETIME (1)');

});

it('can set as timestamp', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->timestamp()
  )
  ->toEqual('test TIMESTAMP');

  expect(
    (string) DBMS::SQLite->column('test')
    ->timestamp(1)
  )
  ->toEqual('test TIMESTAMP (1)');

});

it('can set as year', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->year()
  )
  ->toEqual('test YEAR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->year(2)
  )
  ->toEqual('test YEAR (2)');

});

it('can set as point', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->point()
  )
  ->toEqual('test POINT');

});

it('can set as linestring', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->lineString()
  )
  ->toEqual('test LINESTRING');

});

it('can set as polygon', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->polygon()
  )
  ->toEqual('test POLYGON');

});

it('can set as multipoint', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->multiPoint()
  )
  ->toEqual('test MULTIPOINT');

});

it('can set as multilinestring', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->multiLineString()
  )
  ->toEqual('test MULTILINESTRING');

});

it('can set as multipolygon', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->multiPolygon()
  )
  ->toEqual('test MULTIPOLYGON');

});

it('can set as geometrycollection', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->geometryCollection()
  )
  ->toEqual('test GEOMETRYCOLLECTION');

});

it('can set as json', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->json()
  )
  ->toEqual('test JSON');

});

it('can set as integer', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->integer()
  )
  ->toEqual('test INTEGER');

  expect(
    (string) DBMS::SQLite->column('test')
    ->integer(1)
  )
  ->toEqual('test INTEGER (1)');

});

it('can set as any', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->any()
  )
  ->toEqual('test ANY');

});

it('can set as bigserial', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->bigSerial()
  )
  ->toEqual('test BIGSERIAL');

});

it('can set as varbit', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->varbit()
  )
  ->toEqual('test VARBIT');

  expect(
    (string) DBMS::SQLite->column('test')
    ->varbit(1)
  )
  ->toEqual('test VARBIT (1)');

});

it('can set as boolean', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->boolean()
  )
  ->toEqual('test BOOLEAN');

});

it('can set as box', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->box()
  )
  ->toEqual('test BOX');

});

it('can set as bytea', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->bytea()
  )
  ->toEqual('test BYTEA');

});

it('can set as cidr', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->cidr()
  )
  ->toEqual('test CIDR');

});

it('can set as circle', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->circle()
  )
  ->toEqual('test CIRCLE');

});

it('can set as interval', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->interval()
  )
  ->toEqual('test INTERVAL');

  expect(
    (string) DBMS::SQLite->column('test')
    ->interval(1)
  )
  ->toEqual('test INTERVAL (1)');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalYear()
  )
  ->toEqual('test INTERVAL YEAR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalMonth()
  )
  ->toEqual('test INTERVAL MONTH');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalDay()
  )
  ->toEqual('test INTERVAL DAY');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalHour()
  )
  ->toEqual('test INTERVAL HOUR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalMinute()
  )
  ->toEqual('test INTERVAL MINUTE');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalSecond()
  )
  ->toEqual('test INTERVAL SECOND');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalSecond(1)
  )
  ->toEqual('test INTERVAL SECOND (1)');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalYearToMonth()
  )
  ->toEqual('test INTERVAL YEAR TO MONTH');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalDayToHour()
  )
  ->toEqual('test INTERVAL DAY TO HOUR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalDayToMinute()
  )
  ->toEqual('test INTERVAL DAY TO MINUTE');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalDayToSecond()
  )
  ->toEqual('test INTERVAL DAY TO SECOND');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalDayToSecond(1)
  )
  ->toEqual('test INTERVAL DAY TO SECOND (1)');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalHourToMinute()
  )
  ->toEqual('test INTERVAL HOUR TO MINUTE');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalHourToSecond()
  )
  ->toEqual('test INTERVAL HOUR TO SECOND');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalHourToSecond(1)
  )
  ->toEqual('test INTERVAL HOUR TO SECOND (1)');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalMinuteToSecond()
  )
  ->toEqual('test INTERVAL MINUTE TO SECOND');

  expect(
    (string) DBMS::SQLite->column('test')
    ->intervalMinuteToSecond(1)
  )
  ->toEqual('test INTERVAL MINUTE TO SECOND (1)');

});

it('can set as jsonb', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->jsonb()
  )
  ->toEqual('test JSONB');

});

it('can set as line', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->line()
  )
  ->toEqual('test LINE');

});

it('can set as lseg', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->lseg()
  )
  ->toEqual('test LSEG');

});

it('can set as macaddr', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->macaddr()
  )
  ->toEqual('test MACADDR');

});

it('can set as macaddr8', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->macaddr8()
  )
  ->toEqual('test MACADDR8');

});

it('can set as money', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->money()
  )
  ->toEqual('test MONEY');

});

it('can set as path', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->path()
  )
  ->toEqual('test PATH');

});

it('can set as pg_lsn', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->pglsn()
  )
  ->toEqual('test PG_LSN');

});

it('can set as pg_snapshot', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->pgSnapshot()
  )
  ->toEqual('test PG_SNAPSHOT');

});

it('can set as real', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->real()
  )
  ->toEqual('test REAL');

});

it('can set as smallserial', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->smallSerial()
  )
  ->toEqual('test SMALLSERIAL');

});

it('can set as serial', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->serial()
  )
  ->toEqual('test SERIAL');

});

it('can set as time with timezone', function ()
{

  expect(
    (string) DBMS::PostgreSQL->column('test')
    ->timeWithTimeZone()
  )
  ->toEqual('test TIME WITH TIME ZONE');

  expect(
    (string) DBMS::PostgreSQL->column('test')
    ->timeWithTimeZone(1)
  )
  ->toEqual('test TIME (1) WITH TIME ZONE');

});

it('can set as timestamp with time zone', function ()
{

  expect(
    (string) DBMS::PostgreSQL->column('test')
    ->timestampWithTimeZone()
  )
  ->toEqual('test TIMESTAMP WITH TIME ZONE');

  expect(
    (string) DBMS::PostgreSQL->column('test')
    ->timestampWithTimeZone(1)
  )
  ->toEqual('test TIMESTAMP (1) WITH TIME ZONE');

});

it('can set as tsquery', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->tsQuery()
  )
  ->toEqual('test TSQUERY');

});

it('can set as tsvector', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->tsVector()
  )
  ->toEqual('test TSVECTOR');

});

it('can set as xml', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->xml()
  )
  ->toEqual('test XML');

});

it('can set as smallmoney', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->smallMoney()
  )
  ->toEqual('test SMALLMONEY');

});

it('can set as datetimeoffset', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->datetimeOffset()
  )
  ->toEqual('test DATETIMEOFFSET');

  expect(
    (string) DBMS::SQLite->column('test')
    ->datetimeOffset(1)
  )
  ->toEqual('test DATETIMEOFFSET (1)');

});

it('can set as datetime2', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->datetime2()
  )
  ->toEqual('test DATETIME2');

  expect(
    (string) DBMS::SQLite->column('test')
    ->datetime2(1)
  )
  ->toEqual('test DATETIME2 (1)');

});

it('can set as smalldatetime', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->smallDatetime()
  )
  ->toEqual('test SMALLDATETIME');

});

it('can set as nchar', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->nchar()
  )
  ->toEqual('test NCHAR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->nchar(1)
  )
  ->toEqual('test NCHAR (1)');

});

it('can set as nvarchar', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->nvarchar()
  )
  ->toEqual('test NVARCHAR');

  expect(
    (string) DBMS::SQLite->column('test')
    ->nvarchar(1)
  )
  ->toEqual('test NVARCHAR (1)');

});

it('can set as rowversion', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->rowVersion()
  )
  ->toEqual('test ROWVERSION');

});

it('can set as hierarchyid', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->hierarchyID()
  )
  ->toEqual('test HIERARCHYID');

});

it('can set as uniqueidentifier', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->uniqueIdentifer()
  )
  ->toEqual('test UNIQUEIDENTIFIER');

});

it('can set as sql_variant', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->sqlVariant()
  )
  ->toEqual('test SQL_VARIANT');

});

it('can set as geometry', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->geometry()
  )
  ->toEqual('test GEOMETRY');

});

it('can set as geography', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->geography()
  )
  ->toEqual('test GEOGRAPHY');

});

it('can set length', function ()
{

  expect(
    (string) DBMS::SQLite->column('test')
    ->length(1)
  )
  ->toEqual('test (1)');

  expect(
    (string) DBMS::SQLite->column('test')
    ->length(2, 1)
  )
  ->toEqual('test (2, 1)');

});

it('can set values', function ()
{

  expect(
    (string) $column = DBMS::SQLite->column('test')
    ->values(['test1', 'test2'])
  )
  ->toEqual('test (?, ?)');

  expect($column->bindings())
  ->toEqual([[
    'value' => 'test1',
    'type' => \PDO::PARAM_STR,
  ], [
    'value' => 'test2',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can set with timezone', function ()
{

  expect(
    (string) DBMS::PostgreSQL->column('test')
    ->withTimeZone()
  )
  ->toEqual('test WITH TIME ZONE');

});