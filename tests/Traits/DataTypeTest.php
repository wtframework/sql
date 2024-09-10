<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set as tinyint', function ()
{

  expect(
    (string) SQL::column('test')
    ->tinyInt()
  )
  ->toEqual('test TINYINT');

  expect(
    (string) SQL::column('test')
    ->tinyInt(1)
  )
  ->toEqual('test TINYINT (1)');

});

it('can set as smallint', function ()
{

  expect(
    (string) SQL::column('test')
    ->smallInt()
  )
  ->toEqual('test SMALLINT');

  expect(
    (string) SQL::column('test')
    ->smallInt(1)
  )
  ->toEqual('test SMALLINT (1)');

});

it('can set as mediumint', function ()
{

  expect(
    (string) SQL::column('test')
    ->mediumInt()
  )
  ->toEqual('test MEDIUMINT');

  expect(
    (string) SQL::column('test')
    ->mediumInt(1)
  )
  ->toEqual('test MEDIUMINT (1)');

});

it('can set as int', function ()
{

  expect(
    (string) SQL::column('test')
    ->int()
  )
  ->toEqual('test INTEGER');

  expect(
    (string) SQL::column('test')
    ->int(1)
  )
  ->toEqual('test INTEGER (1)');

});

it('can set as bigint', function ()
{

  expect(
    (string) SQL::column('test')
    ->bigInt()
  )
  ->toEqual('test BIGINT');

  expect(
    (string) SQL::column('test')
    ->bigInt(1)
  )
  ->toEqual('test BIGINT (1)');

});

it('can set as decimal', function ()
{

  expect(
    (string) SQL::column('test')
    ->decimal()
  )
  ->toEqual('test DECIMAL');

  expect(
    (string) SQL::column('test')
    ->decimal(2, 1)
  )
  ->toEqual('test DECIMAL (2, 1)');

});

it('can set as float', function ()
{

  expect(
    (string) SQL::column('test')
    ->float()
  )
  ->toEqual('test FLOAT');

  expect(
    (string) SQL::column('test')
    ->float(2, 1)
  )
  ->toEqual('test FLOAT (2, 1)');

});

it('can set as double', function ()
{

  expect(
    (string) SQL::column('test')
    ->double()
  )
  ->toEqual('test DOUBLE PRECISION');

  expect(
    (string) SQL::column('test')
    ->double(2, 1)
  )
  ->toEqual('test DOUBLE PRECISION (2, 1)');

});

it('can set as bit', function ()
{

  expect(
    (string) SQL::column('test')
    ->bit()
  )
  ->toEqual('test BIT');

  expect(
    (string) SQL::column('test')
    ->bit(1)
  )
  ->toEqual('test BIT (1)');

});

it('can set as binary', function ()
{

  expect(
    (string) SQL::column('test')
    ->binary(1)
  )
  ->toEqual('test BINARY (1)');

});

it('can set as blob', function ()
{

  expect(
    (string) SQL::column('test')
    ->blob()
  )
  ->toEqual('test BLOB');

  expect(
    (string) SQL::column('test')
    ->blob(1)
  )
  ->toEqual('test BLOB (1)');

});

it('can set as char', function ()
{

  expect(
    (string) SQL::column('test')
    ->char()
  )
  ->toEqual('test CHAR');

  expect(
    (string) SQL::column('test')
    ->char(1)
  )
  ->toEqual('test CHAR (1)');

});

it('can set as enum', function ()
{

  expect(
    (string) SQL::column('test')
    ->enum([1, 'test2', SQL::raw("DEFAULT")])
  )
  ->toEqual("test ENUM (1, 'test2', DEFAULT)");

});

it('can set as inet4', function ()
{

  expect(
    (string) SQL::column('test')
    ->inet4()
  )
  ->toEqual('test INET4');

});

it('can set as inet6', function ()
{

  expect(
    (string) SQL::column('test')
    ->inet6()
  )
  ->toEqual('test INET6');

});

it('can set as mediumblob', function ()
{

  expect(
    (string) SQL::column('test')
    ->mediumBlob()
  )
  ->toEqual('test MEDIUMBLOB');

});

it('can set as mediumtext', function ()
{

  expect(
    (string) SQL::column('test')
    ->mediumText()
  )
  ->toEqual('test MEDIUMTEXT');

});

it('can set as longblob', function ()
{

  expect(
    (string) SQL::column('test')
    ->longBlob()
  )
  ->toEqual('test LONGBLOB');

});

it('can set as longtext', function ()
{

  expect(
    (string) SQL::column('test')
    ->longText()
  )
  ->toEqual('test LONGTEXT');

});

it('can set as text', function ()
{

  expect(
    (string) SQL::column('test')
    ->text()
  )
  ->toEqual('test TEXT');

  expect(
    (string) SQL::column('test')
    ->text(1)
  )
  ->toEqual('test TEXT (1)');

});

it('can set as tinyblob', function ()
{

  expect(
    (string) SQL::column('test')
    ->tinyBlob()
  )
  ->toEqual('test TINYBLOB');

});

it('can set as tinytext', function ()
{

  expect(
    (string) SQL::column('test')
    ->tinyText()
  )
  ->toEqual('test TINYTEXT');

});

it('can set as varbinary', function ()
{

  expect(
    (string) SQL::column('test')
    ->varbinary()
  )
  ->toEqual('test VARBINARY');

  expect(
    (string) SQL::column('test')
    ->varbinary(1)
  )
  ->toEqual('test VARBINARY (1)');

});

it('can set as varchar', function ()
{

  expect(
    (string) SQL::column('test')
    ->varchar()
  )
  ->toEqual('test VARCHAR');

  expect(
    (string) SQL::column('test')
    ->varchar(1)
  )
  ->toEqual('test VARCHAR (1)');

});

it('can set as set', function ()
{

  expect(
    (string) SQL::column('test')
    ->set([1, 'test2', SQL::raw("DEFAULT")])
  )
  ->toEqual("test SET (1, 'test2', DEFAULT)");

});

it('can set as uuid', function ()
{

  expect(
    (string) SQL::column('test')
    ->uuid()
  )
  ->toEqual('test UUID');

});

it('can set as date', function ()
{

  expect(
    (string) SQL::column('test')
    ->date()
  )
  ->toEqual('test DATE');

});

it('can set as time', function ()
{

  expect(
    (string) SQL::column('test')
    ->time()
  )
  ->toEqual('test TIME');

  expect(
    (string) SQL::column('test')
    ->time(1)
  )
  ->toEqual('test TIME (1)');

});

it('can set as datetime', function ()
{

  expect(
    (string) SQL::column('test')
    ->datetime()
  )
  ->toEqual('test DATETIME');

  expect(
    (string) SQL::column('test')
    ->datetime(1)
  )
  ->toEqual('test DATETIME (1)');

});

it('can set as timestamp', function ()
{

  expect(
    (string) SQL::column('test')
    ->timestamp()
  )
  ->toEqual('test TIMESTAMP');

  expect(
    (string) SQL::column('test')
    ->timestamp(1)
  )
  ->toEqual('test TIMESTAMP (1)');

});

it('can set as year', function ()
{

  expect(
    (string) SQL::column('test')
    ->year()
  )
  ->toEqual('test YEAR');

  expect(
    (string) SQL::column('test')
    ->year(2)
  )
  ->toEqual('test YEAR (2)');

});

it('can set as point', function ()
{

  expect(
    (string) SQL::column('test')
    ->point()
  )
  ->toEqual('test POINT');

});

it('can set as linestring', function ()
{

  expect(
    (string) SQL::column('test')
    ->lineString()
  )
  ->toEqual('test LINESTRING');

});

it('can set as polygon', function ()
{

  expect(
    (string) SQL::column('test')
    ->polygon()
  )
  ->toEqual('test POLYGON');

});

it('can set as multipoint', function ()
{

  expect(
    (string) SQL::column('test')
    ->multiPoint()
  )
  ->toEqual('test MULTIPOINT');

});

it('can set as multilinestring', function ()
{

  expect(
    (string) SQL::column('test')
    ->multiLineString()
  )
  ->toEqual('test MULTILINESTRING');

});

it('can set as multipolygon', function ()
{

  expect(
    (string) SQL::column('test')
    ->multiPolygon()
  )
  ->toEqual('test MULTIPOLYGON');

});

it('can set as geometrycollection', function ()
{

  expect(
    (string) SQL::column('test')
    ->geometryCollection()
  )
  ->toEqual('test GEOMETRYCOLLECTION');

});

it('can set as json', function ()
{

  expect(
    (string) SQL::column('test')
    ->json()
  )
  ->toEqual('test JSON');

});

it('can set as integer', function ()
{

  expect(
    (string) SQL::column('test')
    ->integer()
  )
  ->toEqual('test INTEGER');

  expect(
    (string) SQL::column('test')
    ->integer(1)
  )
  ->toEqual('test INTEGER (1)');

});

it('can set as any', function ()
{

  expect(
    (string) SQL::column('test')
    ->any()
  )
  ->toEqual('test ANY');

});

it('can set as bigserial', function ()
{

  expect(
    (string) SQL::column('test')
    ->bigSerial()
  )
  ->toEqual('test BIGSERIAL');

});

it('can set as varbit', function ()
{

  expect(
    (string) SQL::column('test')
    ->varbit()
  )
  ->toEqual('test VARBIT');

  expect(
    (string) SQL::column('test')
    ->varbit(1)
  )
  ->toEqual('test VARBIT (1)');

});

it('can set as boolean', function ()
{

  expect(
    (string) SQL::column('test')
    ->boolean()
  )
  ->toEqual('test BOOLEAN');

});

it('can set as box', function ()
{

  expect(
    (string) SQL::column('test')
    ->box()
  )
  ->toEqual('test BOX');

});

it('can set as bytea', function ()
{

  expect(
    (string) SQL::column('test')
    ->bytea()
  )
  ->toEqual('test BYTEA');

});

it('can set as cidr', function ()
{

  expect(
    (string) SQL::column('test')
    ->cidr()
  )
  ->toEqual('test CIDR');

});

it('can set as circle', function ()
{

  expect(
    (string) SQL::column('test')
    ->circle()
  )
  ->toEqual('test CIRCLE');

});

it('can set as interval', function ()
{

  expect(
    (string) SQL::column('test')
    ->interval()
  )
  ->toEqual('test INTERVAL');

  expect(
    (string) SQL::column('test')
    ->interval(1)
  )
  ->toEqual('test INTERVAL (1)');

  expect(
    (string) SQL::column('test')
    ->intervalYear()
  )
  ->toEqual('test INTERVAL YEAR');

  expect(
    (string) SQL::column('test')
    ->intervalMonth()
  )
  ->toEqual('test INTERVAL MONTH');

  expect(
    (string) SQL::column('test')
    ->intervalDay()
  )
  ->toEqual('test INTERVAL DAY');

  expect(
    (string) SQL::column('test')
    ->intervalHour()
  )
  ->toEqual('test INTERVAL HOUR');

  expect(
    (string) SQL::column('test')
    ->intervalMinute()
  )
  ->toEqual('test INTERVAL MINUTE');

  expect(
    (string) SQL::column('test')
    ->intervalSecond()
  )
  ->toEqual('test INTERVAL SECOND');

  expect(
    (string) SQL::column('test')
    ->intervalSecond(1)
  )
  ->toEqual('test INTERVAL SECOND (1)');

  expect(
    (string) SQL::column('test')
    ->intervalYearToMonth()
  )
  ->toEqual('test INTERVAL YEAR TO MONTH');

  expect(
    (string) SQL::column('test')
    ->intervalDayToHour()
  )
  ->toEqual('test INTERVAL DAY TO HOUR');

  expect(
    (string) SQL::column('test')
    ->intervalDayToMinute()
  )
  ->toEqual('test INTERVAL DAY TO MINUTE');

  expect(
    (string) SQL::column('test')
    ->intervalDayToSecond()
  )
  ->toEqual('test INTERVAL DAY TO SECOND');

  expect(
    (string) SQL::column('test')
    ->intervalDayToSecond(1)
  )
  ->toEqual('test INTERVAL DAY TO SECOND (1)');

  expect(
    (string) SQL::column('test')
    ->intervalHourToMinute()
  )
  ->toEqual('test INTERVAL HOUR TO MINUTE');

  expect(
    (string) SQL::column('test')
    ->intervalHourToSecond()
  )
  ->toEqual('test INTERVAL HOUR TO SECOND');

  expect(
    (string) SQL::column('test')
    ->intervalHourToSecond(1)
  )
  ->toEqual('test INTERVAL HOUR TO SECOND (1)');

  expect(
    (string) SQL::column('test')
    ->intervalMinuteToSecond()
  )
  ->toEqual('test INTERVAL MINUTE TO SECOND');

  expect(
    (string) SQL::column('test')
    ->intervalMinuteToSecond(1)
  )
  ->toEqual('test INTERVAL MINUTE TO SECOND (1)');

});

it('can set as jsonb', function ()
{

  expect(
    (string) SQL::column('test')
    ->jsonb()
  )
  ->toEqual('test JSONB');

});

it('can set as line', function ()
{

  expect(
    (string) SQL::column('test')
    ->line()
  )
  ->toEqual('test LINE');

});

it('can set as lseg', function ()
{

  expect(
    (string) SQL::column('test')
    ->lseg()
  )
  ->toEqual('test LSEG');

});

it('can set as macaddr', function ()
{

  expect(
    (string) SQL::column('test')
    ->macaddr()
  )
  ->toEqual('test MACADDR');

});

it('can set as macaddr8', function ()
{

  expect(
    (string) SQL::column('test')
    ->macaddr8()
  )
  ->toEqual('test MACADDR8');

});

it('can set as money', function ()
{

  expect(
    (string) SQL::column('test')
    ->money()
  )
  ->toEqual('test MONEY');

});

it('can set as path', function ()
{

  expect(
    (string) SQL::column('test')
    ->path()
  )
  ->toEqual('test PATH');

});

it('can set as pg_lsn', function ()
{

  expect(
    (string) SQL::column('test')
    ->pglsn()
  )
  ->toEqual('test PG_LSN');

});

it('can set as pg_snapshot', function ()
{

  expect(
    (string) SQL::column('test')
    ->pgSnapshot()
  )
  ->toEqual('test PG_SNAPSHOT');

});

it('can set as real', function ()
{

  expect(
    (string) SQL::column('test')
    ->real()
  )
  ->toEqual('test REAL');

});

it('can set as smallserial', function ()
{

  expect(
    (string) SQL::column('test')
    ->smallSerial()
  )
  ->toEqual('test SMALLSERIAL');

});

it('can set as serial', function ()
{

  expect(
    (string) SQL::column('test')
    ->serial()
  )
  ->toEqual('test SERIAL');

});

it('can set as time with timezone', function ()
{

  expect(
    (string) SQL::column('test')
    ->timeWithTimeZone()
  )
  ->toEqual('test TIME WITH TIME ZONE');

  expect(
    (string) SQL::column('test')
    ->timeWithTimeZone(1)
  )
  ->toEqual('test TIME (1) WITH TIME ZONE');

});

it('can set as timestamp with time zone', function ()
{

  expect(
    (string) SQL::column('test')
    ->timestampWithTimeZone()
  )
  ->toEqual('test TIMESTAMP WITH TIME ZONE');

  expect(
    (string) SQL::column('test')
    ->timestampWithTimeZone(1)
  )
  ->toEqual('test TIMESTAMP (1) WITH TIME ZONE');

});

it('can set as tsquery', function ()
{

  expect(
    (string) SQL::column('test')
    ->tsQuery()
  )
  ->toEqual('test TSQUERY');

});

it('can set as tsvector', function ()
{

  expect(
    (string) SQL::column('test')
    ->tsVector()
  )
  ->toEqual('test TSVECTOR');

});

it('can set as xml', function ()
{

  expect(
    (string) SQL::column('test')
    ->xml()
  )
  ->toEqual('test XML');

});

it('can set as smallmoney', function ()
{

  expect(
    (string) SQL::column('test')
    ->smallMoney()
  )
  ->toEqual('test SMALLMONEY');

});

it('can set as datetimeoffset', function ()
{

  expect(
    (string) SQL::column('test')
    ->datetimeOffset()
  )
  ->toEqual('test DATETIMEOFFSET');

  expect(
    (string) SQL::column('test')
    ->datetimeOffset(1)
  )
  ->toEqual('test DATETIMEOFFSET (1)');

});

it('can set as datetime2', function ()
{

  expect(
    (string) SQL::column('test')
    ->datetime2()
  )
  ->toEqual('test DATETIME2');

  expect(
    (string) SQL::column('test')
    ->datetime2(1)
  )
  ->toEqual('test DATETIME2 (1)');

});

it('can set as smalldatetime', function ()
{

  expect(
    (string) SQL::column('test')
    ->smallDatetime()
  )
  ->toEqual('test SMALLDATETIME');

});

it('can set as nchar', function ()
{

  expect(
    (string) SQL::column('test')
    ->nchar()
  )
  ->toEqual('test NCHAR');

  expect(
    (string) SQL::column('test')
    ->nchar(1)
  )
  ->toEqual('test NCHAR (1)');

});

it('can set as nvarchar', function ()
{

  expect(
    (string) SQL::column('test')
    ->nvarchar()
  )
  ->toEqual('test NVARCHAR');

  expect(
    (string) SQL::column('test')
    ->nvarchar(1)
  )
  ->toEqual('test NVARCHAR (1)');

});

it('can set as rowversion', function ()
{

  expect(
    (string) SQL::column('test')
    ->rowVersion()
  )
  ->toEqual('test ROWVERSION');

});

it('can set as hierarchyid', function ()
{

  expect(
    (string) SQL::column('test')
    ->hierarchyID()
  )
  ->toEqual('test HIERARCHYID');

});

it('can set as uniqueidentifier', function ()
{

  expect(
    (string) SQL::column('test')
    ->uniqueIdentifer()
  )
  ->toEqual('test UNIQUEIDENTIFIER');

});

it('can set as sql_variant', function ()
{

  expect(
    (string) SQL::column('test')
    ->sqlVariant()
  )
  ->toEqual('test SQL_VARIANT');

});

it('can set as geometry', function ()
{

  expect(
    (string) SQL::column('test')
    ->geometry()
  )
  ->toEqual('test GEOMETRY');

});

it('can set as geography', function ()
{

  expect(
    (string) SQL::column('test')
    ->geography()
  )
  ->toEqual('test GEOGRAPHY');

});

it('can set length', function ()
{

  expect(
    (string) SQL::column('test')
    ->length(1)
  )
  ->toEqual('test (1)');

  expect(
    (string) SQL::column('test')
    ->length(2, 1)
  )
  ->toEqual('test (2, 1)');

});

it('can set values', function ()
{

  expect(
    (string) SQL::column('test')
    ->values([1, 'test2', SQL::raw("DEFAULT")])
  )
  ->toEqual("test (1, 'test2', DEFAULT)");

});

it('can set with timezone', function ()
{

  expect(
    (string) SQL::column('test')
    ->withTimeZone()
  )
  ->toEqual('test WITH TIME ZONE');

});