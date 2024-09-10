<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Column;
use WTFramework\SQL\SQL;

trait CreateDataType
{

  protected function createColumn(string $name): Column
  {

    $this->column($column = SQL::column($name));

    return $column;

  }

  public function tinyInt(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->tinyInt($length);

  }

  public function smallInt(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->smallInt($length);
  }

  public function mediumInt(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->mediumInt($length);
  }

  public function int(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->int($length);
  }

  public function bigInt(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->bigInt($length);
  }

  public function decimal(
    string $column,
    int $length = null,
    int $decimals = null
  ): Column
  {
    return $this->createColumn($column)->decimal($length, $decimals);
  }

  public function float(
    string $column,
    int $length = null,
    int $decimals = null
  ): Column
  {
    return $this->createColumn($column)->float($length, $decimals);
  }

  public function double(
    string $column,
    int $length = null,
    int $decimals = null
  ): Column
  {
    return $this->createColumn($column)->double($length, $decimals);
  }

  public function bit(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->bit($length);
  }

  public function binary(string $column, int $length): Column
  {
    return $this->createColumn($column)->binary($length);
  }

  public function blob(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->blob($length);
  }

  public function char(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->char($length);
  }

  public function enum(string $column, string|HasBindings|array $values = null): Column
  {
    return $this->createColumn($column)->enum($values);
  }

  public function inet4(string $column): Column
  {
    return $this->createColumn($column)->inet4();
  }

  public function inet6(string $column): Column
  {
    return $this->createColumn($column)->inet6();
  }

  public function mediumBlob(string $column): Column
  {
    return $this->createColumn($column)->mediumBlob();
  }

  public function mediumText(string $column): Column
  {
    return $this->createColumn($column)->mediumText();
  }

  public function longBlob(string $column): Column
  {
    return $this->createColumn($column)->longBlob();
  }

  public function longText(string $column): Column
  {
    return $this->createColumn($column)->longText();
  }

  public function text(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->text($length);
  }

  public function tinyBlob(string $column): Column
  {
    return $this->createColumn($column)->tinyBlob();
  }

  public function tinyText(string $column): Column
  {
    return $this->createColumn($column)->tinyText();
  }

  public function varbinary(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->varbinary($length);
  }

  public function varchar(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->varchar($length);
  }

  public function set(string $column, string|HasBindings|array $values = null): Column
  {
    return $this->createColumn($column)->set($values);
  }

  public function uuid(string $column): Column
  {
    return $this->createColumn($column)->uuid();
  }

  public function date(string $column): Column
  {
    return $this->createColumn($column)->date();
  }

  public function time(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->time($precision);
  }

  public function datetime(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->datetime($precision);
  }

  public function timestamp(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->timestamp($precision);
  }

  public function year(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->year($length);
  }

  public function point(string $column): Column
  {
    return $this->createColumn($column)->point();
  }

  public function lineString(string $column): Column
  {
    return $this->createColumn($column)->lineString();
  }

  public function polygon(string $column): Column
  {
    return $this->createColumn($column)->polygon();
  }

  public function multiPoint(string $column): Column
  {
    return $this->createColumn($column)->multiPoint();
  }

  public function multiLineString(string $column): Column
  {
    return $this->createColumn($column)->multiLineString();
  }

  public function multiPolygon(string $column): Column
  {
    return $this->createColumn($column)->multiPolygon();
  }

  public function geometryCollection(string $column): Column
  {
    return $this->createColumn($column)->geometryCollection();
  }

  public function json(string $column): Column
  {
    return $this->createColumn($column)->json();
  }

  public function integer(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->integer($length);
  }

  public function any(string $column): Column
  {
    return $this->createColumn($column)->any();
  }

  public function bigSerial(string $column): Column
  {
    return $this->createColumn($column)->bigSerial();
  }

  public function varbit(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->varbit($length);
  }

  public function boolean(string $column): Column
  {
    return $this->createColumn($column)->boolean();
  }

  public function box(string $column): Column
  {
    return $this->createColumn($column)->box();
  }

  public function bytea(string $column): Column
  {
    return $this->createColumn($column)->bytea();
  }

  public function cidr(string $column): Column
  {
    return $this->createColumn($column)->cidr();
  }

  public function circle(string $column): Column
  {
    return $this->createColumn($column)->circle();
  }

  public function interval(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->interval($precision);
  }

  public function intervalYear(string $column): Column
  {
    return $this->createColumn($column)->intervalYear();
  }

  public function intervalMonth(string $column): Column
  {
    return $this->createColumn($column)->intervalMonth();
  }

  public function intervalDay(string $column): Column
  {
    return $this->createColumn($column)->intervalDay();
  }

  public function intervalHour(string $column): Column
  {
    return $this->createColumn($column)->intervalHour();
  }

  public function intervalMinute(string $column): Column
  {
    return $this->createColumn($column)->intervalMinute();
  }

  public function intervalSecond(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->intervalSecond($precision);
  }

  public function intervalYearToMonth(string $column): Column
  {
    return $this->createColumn($column)->intervalYearToMonth();
  }

  public function intervalDayToHour(string $column): Column
  {
    return $this->createColumn($column)->intervalDayToHour();
  }

  public function intervalDayToMinute(string $column): Column
  {
    return $this->createColumn($column)->intervalDayToMinute();
  }

  public function intervalDayToSecond(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->intervalDayToSecond($precision);
  }

  public function intervalHourToMinute(string $column): Column
  {
    return $this->createColumn($column)->intervalHourToMinute();
  }

  public function intervalHourToSecond(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->intervalHourToSecond($precision);
  }

  public function intervalMinuteToSecond(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->intervalMinuteToSecond($precision);
  }

  public function jsonb(string $column): Column
  {
    return $this->createColumn($column)->jsonb();
  }

  public function line(string $column): Column
  {
    return $this->createColumn($column)->line();
  }

  public function lseg(string $column): Column
  {
    return $this->createColumn($column)->lseg();
  }

  public function macaddr(string $column): Column
  {
    return $this->createColumn($column)->macaddr();
  }

  public function macaddr8(string $column): Column
  {
    return $this->createColumn($column)->macaddr8();
  }

  public function money(string $column): Column
  {
    return $this->createColumn($column)->money();
  }

  public function path(string $column): Column
  {
    return $this->createColumn($column)->path();
  }

  public function pglsn(string $column): Column
  {
    return $this->createColumn($column)->pglsn();
  }

  public function pgSnapshot(string $column): Column
  {
    return $this->createColumn($column)->pgSnapshot();
  }

  public function real(string $column): Column
  {
    return $this->createColumn($column)->real();
  }

  public function smallSerial(string $column): Column
  {
    return $this->createColumn($column)->smallSerial();
  }

  public function serial(string $column): Column
  {
    return $this->createColumn($column)->serial();
  }

  public function timeWithTimeZone(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->timeWithTimeZone($precision);
  }

  public function timestampWithTimeZone(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->timestampWithTimeZone($precision);
  }

  public function tsQuery(string $column): Column
  {
    return $this->createColumn($column)->tsQuery();
  }

  public function tsVector(string $column): Column
  {
    return $this->createColumn($column)->tsVector();
  }

  public function xml(string $column): Column
  {
    return $this->createColumn($column)->xml();
  }

  public function smallMoney(string $column): Column
  {
    return $this->createColumn($column)->smallMoney();
  }

  public function datetimeOffset(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->datetimeOffset($precision);
  }

  public function datetime2(string $column, int $precision = null): Column
  {
    return $this->createColumn($column)->datetime2($precision);
  }

  public function smallDatetime(string $column): Column
  {
    return $this->createColumn($column)->smallDatetime();
  }

  public function nchar(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->nchar($length);
  }

  public function nvarchar(string $column, int $length = null): Column
  {
    return $this->createColumn($column)->nvarchar($length);
  }

  public function rowVersion(string $column): Column
  {
    return $this->createColumn($column)->rowVersion();
  }

  public function hierarchyID(string $column): Column
  {
    return $this->createColumn($column)->hierarchyID();
  }

  public function uniqueIdentifer(string $column): Column
  {
    return $this->createColumn($column)->uniqueIdentifer();
  }

  public function sqlVariant(string $column): Column
  {
    return $this->createColumn($column)->sqlVariant();
  }

  public function geometry(string $column): Column
  {
    return $this->createColumn($column)->geometry();
  }

  public function geography(string $column): Column
  {
    return $this->createColumn($column)->geography();
  }

}