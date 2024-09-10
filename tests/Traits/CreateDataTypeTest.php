<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Column;
use WTFramework\SQL\SQL;

it('can create tinyint', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->tinyInt("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TINYINT (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TINYINT (1))');

});

it('can create smallint', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->smallInt("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 SMALLINT (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 SMALLINT (1))');

});

it('can create mediumint', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->mediumInt("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MEDIUMINT (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MEDIUMINT (1))');

});

it('can create int', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->int("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTEGER (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTEGER (1))');

});

it('can create bigint', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->bigInt("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BIGINT (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BIGINT (1))');

});

it('can create decimal', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->decimal("test2", 1, 2);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 DECIMAL (1, 2)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 DECIMAL (1, 2))');

});

it('can create float', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->float("test2", 1, 2);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 FLOAT (1, 2)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 FLOAT (1, 2))');

});

it('can create double', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->double("test2", 1, 2);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 DOUBLE PRECISION (1, 2)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 DOUBLE PRECISION (1, 2))');

});

it('can create bit', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->bit("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BIT (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BIT (1))');

});

it('can create binary', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->binary("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BINARY (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BINARY (1))');

});

it('can create blob', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->blob("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BLOB (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BLOB (1))');

});

it('can create char', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->char("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 CHAR (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 CHAR (1))');

});

it('can create enum', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->enum("test2", [1, 2]);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 ENUM (1, 2)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 ENUM (1, 2))');

});

it('can create inet4', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->inet4("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INET4');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INET4)');

});

it('can create inet6', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->inet6("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INET6');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INET6)');

});

it('can create mediumblob', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->mediumBlob("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MEDIUMBLOB');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MEDIUMBLOB)');

});

it('can create mediumtext', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->mediumText("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MEDIUMTEXT');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MEDIUMTEXT)');

});

it('can create longblob', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->longBlob("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 LONGBLOB');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 LONGBLOB)');

});

it('can create lontext', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->longText("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 LONGTEXT');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 LONGTEXT)');

});

it('can create text', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->text("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TEXT (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TEXT (1))');

});

it('can create tinyblob', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->tinyBlob("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TINYBLOB');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TINYBLOB)');

});

it('can create tinytext', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->tinyText("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TINYTEXT');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TINYTEXT)');

});

it('can create varbinary', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->varbinary("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 VARBINARY (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 VARBINARY (1))');

});

it('can create varchar', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->varchar("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 VARCHAR (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 VARCHAR (1))');

});

it('can create set', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->set("test2", [1, 2]);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 SET (1, 2)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 SET (1, 2))');

});

it('can create uuid', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->uuid("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 UUID');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 UUID)');

});

it('can create date', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->date("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 DATE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 DATE)');

});

it('can create time', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->time("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TIME (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TIME (1))');

});

it('can create datetime', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->datetime("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 DATETIME (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 DATETIME (1))');

});

it('can create timestamp', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->timestamp("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TIMESTAMP (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TIMESTAMP (1))');

});

it('can create year', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->year("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 YEAR (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 YEAR (1))');

});

it('can create point', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->point("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 POINT');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 POINT)');

});

it('can create linestring', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->linestring("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 LINESTRING');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 LINESTRING)');

});

it('can create polygon', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->polygon("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 POLYGON');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 POLYGON)');

});

it('can create multipoint', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->multiPoint("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MULTIPOINT');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MULTIPOINT)');

});

it('can create multilinestring', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->multiLineString("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MULTILINESTRING');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MULTILINESTRING)');

});

it('can create multipolygon', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->multiPolygon("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MULTIPOLYGON');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MULTIPOLYGON)');

});

it('can create geometrycollection', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->geometryCollection("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 GEOMETRYCOLLECTION');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 GEOMETRYCOLLECTION)');

});

it('can create json', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->json("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 JSON');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 JSON)');

});

it('can create integer', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->integer("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTEGER (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTEGER (1))');

});

it('can create any', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->any("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 ANY');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 ANY)');

});

it('can create bigserial', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->bigSerial("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BIGSERIAL');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BIGSERIAL)');

});

it('can create varbit', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->varbit("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 VARBIT (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 VARBIT (1))');

});

it('can create boolean', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->boolean("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BOOLEAN');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BOOLEAN)');

});

it('can create box', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->box("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BOX');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BOX)');

});

it('can create bytea', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->bytea("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 BYTEA');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 BYTEA)');

});

it('can create cidr', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->cidr("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 CIDR');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 CIDR)');

});

it('can create circle', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->circle("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 CIRCLE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 CIRCLE)');

});

it('can create interval', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->interval("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL (1))');

});

it('can create interval year', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalYear("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL YEAR');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL YEAR)');

});

it('can create interval month', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalMonth("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL MONTH');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL MONTH)');

});

it('can create interval day', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalDay("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL DAY');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL DAY)');

});

it('can create interval hour', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalHour("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL HOUR');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL HOUR)');

});

it('can create interval minute', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalMinute("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL MINUTE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL MINUTE)');

});

it('can create interval second', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalSecond("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL SECOND (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL SECOND (1))');

});

it('can create interval year to month', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalYearToMonth("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL YEAR TO MONTH');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL YEAR TO MONTH)');

});

it('can create interval day to hour', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalDayToHour("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL DAY TO HOUR');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL DAY TO HOUR)');

});

it('can create interval day to minute', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalDayToMinute("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL DAY TO MINUTE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL DAY TO MINUTE)');

});

it('can create interval day to second', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalDayToSecond("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL DAY TO SECOND (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL DAY TO SECOND (1))');

});

it('can create interval hour to minute', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalHourToMinute("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL HOUR TO MINUTE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL HOUR TO MINUTE)');

});

it('can create interval hour to second', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalHourToSecond("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL HOUR TO SECOND (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL HOUR TO SECOND (1))');

});

it('can create interval minute to second', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->intervalMinuteToSecond("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 INTERVAL MINUTE TO SECOND (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 INTERVAL MINUTE TO SECOND (1))');

});

it('can create jsonb', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->jsonb("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 JSONB');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 JSONB)');

});

it('can create line', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->line("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 LINE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 LINE)');

});

it('can create lseg', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->lseg("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 LSEG');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 LSEG)');

});

it('can create macaddr', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->macaddr("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MACADDR');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MACADDR)');

});

it('can create macaddr8', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->macaddr8("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MACADDR8');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MACADDR8)');

});

it('can create money', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->money("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 MONEY');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 MONEY)');

});

it('can create path', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->path("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 PATH');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 PATH)');

});

it('can create pglsn', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->pglsn("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 PG_LSN');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 PG_LSN)');

});

it('can create pgsnapshot', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->pgSnapshot("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 PG_SNAPSHOT');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 PG_SNAPSHOT)');

});

it('can create real', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->real("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 REAL');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 REAL)');

});

it('can create smallserial', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->smallSerial("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 SMALLSERIAL');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 SMALLSERIAL)');

});

it('can create serial', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->serial("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 SERIAL');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 SERIAL)');

});

it('can create time with timezone', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->timeWithTimeZone("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TIME (1) WITH TIME ZONE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TIME (1) WITH TIME ZONE)');

});

it('can create timestamp with timezone', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->timestampWithTimeZone("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TIMESTAMP (1) WITH TIME ZONE');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TIMESTAMP (1) WITH TIME ZONE)');

});

it('can create tsquery', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->tsQuery("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TSQUERY');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TSQUERY)');

});

it('can create tsvecor', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->tsVector("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 TSVECTOR');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 TSVECTOR)');

});

it('can create xml', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->xml("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 XML');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 XML)');

});

it('can create smallmoney', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->smallMoney("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 SMALLMONEY');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 SMALLMONEY)');

});

it('can create datetimeoffset', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->datetimeOffset("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 DATETIMEOFFSET (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 DATETIMEOFFSET (1))');

});

it('can create datetime2', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->datetime2("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 DATETIME2 (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 DATETIME2 (1))');

});

it('can create smalldatetime', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->smallDatetime("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 SMALLDATETIME');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 SMALLDATETIME)');

});

it('can create nchar', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->nchar("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 NCHAR (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 NCHAR (1))');

});

it('can create nvarchar', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->nvarchar("test2", 1);

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 NVARCHAR (1)');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 NVARCHAR (1))');

});

it('can create rowversion', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->rowVersion("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 ROWVERSION');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 ROWVERSION)');

});

it('can create hierarchyid', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->hierarchyID("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 HIERARCHYID');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 HIERARCHYID)');

});

it('can create uniqueidentifier', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->uniqueIdentifer("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 UNIQUEIDENTIFIER');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 UNIQUEIDENTIFIER)');

});

it('can create sql variant', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->sqlVariant("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 SQL_VARIANT');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 SQL_VARIANT)');

});

it('can create geometry', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->geometry("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 GEOMETRY');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 GEOMETRY)');

});

it('can create geography', function ()
{

  $sql = SQL::create()->table("test1");

  $column = $sql->geography("test2");

  expect($column)
  ->toBeInstanceOf(Column::class);

  expect((string) $column)
  ->toEqual('test2 GEOGRAPHY');

  expect((string) $sql)
  ->toEqual('CREATE TABLE test1 (test2 GEOGRAPHY)');

});