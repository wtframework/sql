<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Column;

trait CreateDataType
{

  public function tinyInt(string $name, int $length = null): Column
  {
    return $this->column($name)->tinyInt($length);
  }

  public function smallInt(string $name, int $length = null): Column
  {
    return $this->column($name)->smallInt($length);
  }

  public function mediumInt(string $name, int $length = null): Column
  {
    return $this->column($name)->mediumInt($length);
  }

  public function int(string $name, int $length = null): Column
  {
    return $this->column($name)->int($length);
  }

  public function bigInt(string $name, int $length = null): Column
  {
    return $this->column($name)->bigInt($length);
  }

  public function decimal(
    string $name,
    int $length = null,
    int $decimals = null
  ): Column
  {
    return $this->column($name)->decimal($length, $decimals);
  }

  public function float(
    string $name,
    int $length = null,
    int $decimals = null
  ): Column
  {
    return $this->column($name)->float($length, $decimals);
  }

  public function double(
    string $name,
    int $length = null,
    int $decimals = null
  ): Column
  {
    return $this->column($name)->double($length, $decimals);
  }

  public function bit(string $name, int $length = null): Column
  {
    return $this->column($name)->bit($length);
  }

  public function binary(string $name, int $length): Column
  {
    return $this->column($name)->binary($length);
  }

  public function blob(string $name, int $length = null): Column
  {
    return $this->column($name)->blob($length);
  }

  public function char(string $name, int $length = null): Column
  {
    return $this->column($name)->char($length);
  }

  public function enum(string $name, string|HasBindings|array $values = null): Column
  {
    return $this->column($name)->enum($values);
  }

  public function inet4(string $name): Column
  {
    return $this->column($name)->inet4();
  }

  public function inet6(string $name): Column
  {
    return $this->column($name)->inet6();
  }

  public function mediumBlob(string $name): Column
  {
    return $this->column($name)->mediumBlob();
  }

  public function mediumText(string $name): Column
  {
    return $this->column($name)->mediumText();
  }

  public function longBlob(string $name): Column
  {
    return $this->column($name)->longBlob();
  }

  public function longText(string $name): Column
  {
    return $this->column($name)->longText();
  }

  public function text(string $name, int $length = null): Column
  {
    return $this->column($name)->text($length);
  }

  public function tinyBlob(string $name): Column
  {
    return $this->column($name)->tinyBlob();
  }

  public function tinyText(string $name): Column
  {
    return $this->column($name)->tinyText();
  }

  public function varbinary(string $name, int $length = null): Column
  {
    return $this->column($name)->varbinary($length);
  }

  public function varchar(string $name, int $length = null): Column
  {
    return $this->column($name)->varchar($length);
  }

  public function set(string $name, string|HasBindings|array $values = null): Column
  {
    return $this->column($name)->set($values);
  }

  public function uuid(string $name): Column
  {
    return $this->column($name)->uuid();
  }

  public function date(string $name): Column
  {
    return $this->column($name)->date();
  }

  public function time(string $name, int $precision = null): Column
  {
    return $this->column($name)->time($precision);
  }

  public function datetime(string $name, int $precision = null): Column
  {
    return $this->column($name)->datetime($precision);
  }

  public function timestamp(string $name, int $precision = null): Column
  {
    return $this->column($name)->timestamp($precision);
  }

  public function year(string $name, int $length = null): Column
  {
    return $this->column($name)->year($length);
  }

  public function point(string $name): Column
  {
    return $this->column($name)->point();
  }

  public function lineString(string $name): Column
  {
    return $this->column($name)->lineString();
  }

  public function polygon(string $name): Column
  {
    return $this->column($name)->polygon();
  }

  public function multiPoint(string $name): Column
  {
    return $this->column($name)->multiPoint();
  }

  public function multiLineString(string $name): Column
  {
    return $this->column($name)->multiLineString();
  }

  public function multiPolygon(string $name): Column
  {
    return $this->column($name)->multiPolygon();
  }

  public function geometryCollection(string $name): Column
  {
    return $this->column($name)->geometryCollection();
  }

  public function json(string $name): Column
  {
    return $this->column($name)->json();
  }

  public function integer(string $name, int $length = null): Column
  {
    return $this->column($name)->integer($length);
  }

  public function any(string $name): Column
  {
    return $this->column($name)->any();
  }

  public function bigSerial(string $name): Column
  {
    return $this->column($name)->bigSerial();
  }

  public function varbit(string $name, int $length = null): Column
  {
    return $this->column($name)->varbit($length);
  }

  public function boolean(string $name): Column
  {
    return $this->column($name)->boolean();
  }

  public function box(string $name): Column
  {
    return $this->column($name)->box();
  }

  public function bytea(string $name): Column
  {
    return $this->column($name)->bytea();
  }

  public function cidr(string $name): Column
  {
    return $this->column($name)->cidr();
  }

  public function circle(string $name): Column
  {
    return $this->column($name)->circle();
  }

  public function interval(string $name, int $precision = null): Column
  {
    return $this->column($name)->interval($precision);
  }

  public function intervalYear(string $name): Column
  {
    return $this->column($name)->intervalYear();
  }

  public function intervalMonth(string $name): Column
  {
    return $this->column($name)->intervalMonth();
  }

  public function intervalDay(string $name): Column
  {
    return $this->column($name)->intervalDay();
  }

  public function intervalHour(string $name): Column
  {
    return $this->column($name)->intervalHour();
  }

  public function intervalMinute(string $name): Column
  {
    return $this->column($name)->intervalMinute();
  }

  public function intervalSecond(string $name, int $precision = null): Column
  {
    return $this->column($name)->intervalSecond($precision);
  }

  public function intervalYearToMonth(string $name): Column
  {
    return $this->column($name)->intervalYearToMonth();
  }

  public function intervalDayToHour(string $name): Column
  {
    return $this->column($name)->intervalDayToHour();
  }

  public function intervalDayToMinute(string $name): Column
  {
    return $this->column($name)->intervalDayToMinute();
  }

  public function intervalDayToSecond(string $name, int $precision = null): Column
  {
    return $this->column($name)->intervalDayToSecond($precision);
  }

  public function intervalHourToMinute(string $name): Column
  {
    return $this->column($name)->intervalHourToMinute();
  }

  public function intervalHourToSecond(string $name, int $precision = null): Column
  {
    return $this->column($name)->intervalHourToSecond($precision);
  }

  public function intervalMinuteToSecond(string $name, int $precision = null): Column
  {
    return $this->column($name)->intervalMinuteToSecond($precision);
  }

  public function jsonb(string $name): Column
  {
    return $this->column($name)->jsonb();
  }

  public function line(string $name): Column
  {
    return $this->column($name)->line();
  }

  public function lseg(string $name): Column
  {
    return $this->column($name)->lseg();
  }

  public function macaddr(string $name): Column
  {
    return $this->column($name)->macaddr();
  }

  public function macaddr8(string $name): Column
  {
    return $this->column($name)->macaddr8();
  }

  public function money(string $name): Column
  {
    return $this->column($name)->money();
  }

  public function path(string $name): Column
  {
    return $this->column($name)->path();
  }

  public function pglsn(string $name): Column
  {
    return $this->column($name)->pglsn();
  }

  public function pgSnapshot(string $name): Column
  {
    return $this->column($name)->pgSnapshot();
  }

  public function real(string $name): Column
  {
    return $this->column($name)->real();
  }

  public function smallSerial(string $name): Column
  {
    return $this->column($name)->smallSerial();
  }

  public function serial(string $name): Column
  {
    return $this->column($name)->serial();
  }

  public function timeWithTimeZone(string $name, int $precision = null): Column
  {
    return $this->column($name)->timeWithTimeZone($precision);
  }

  public function timestampWithTimeZone(string $name, int $precision = null): Column
  {
    return $this->column($name)->timestampWithTimeZone($precision);
  }

  public function tsQuery(string $name): Column
  {
    return $this->column($name)->tsQuery();
  }

  public function tsVector(string $name): Column
  {
    return $this->column($name)->tsVector();
  }

  public function xml(string $name): Column
  {
    return $this->column($name)->xml();
  }

  public function smallMoney(string $name): Column
  {
    return $this->column($name)->smallMoney();
  }

  public function datetimeOffset(string $name, int $precision = null): Column
  {
    return $this->column($name)->datetimeOffset($precision);
  }

  public function datetime2(string $name, int $precision = null): Column
  {
    return $this->column($name)->datetime2($precision);
  }

  public function smallDatetime(string $name): Column
  {
    return $this->column($name)->smallDatetime();
  }

  public function nchar(string $name, int $length = null): Column
  {
    return $this->column($name)->nchar($length);
  }

  public function nvarchar(string $name, int $length = null): Column
  {
    return $this->column($name)->nvarchar($length);
  }

  public function rowVersion(string $name): Column
  {
    return $this->column($name)->rowVersion();
  }

  public function hierarchyID(string $name): Column
  {
    return $this->column($name)->hierarchyID();
  }

  public function uniqueIdentifer(string $name): Column
  {
    return $this->column($name)->uniqueIdentifer();
  }

  public function sqlVariant(string $name): Column
  {
    return $this->column($name)->sqlVariant();
  }

  public function geometry(string $name): Column
  {
    return $this->column($name)->geometry();
  }

  public function geography(string $name): Column
  {
    return $this->column($name)->geography();
  }

}