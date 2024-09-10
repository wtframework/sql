<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait DataType
{

  protected string $data_type = '';
  protected ?int $length = null;
  protected ?int $decimals = null;
  protected array $values = [];
  protected string $with_time_zone = '';

  public function tinyInt(?int $length = null): static
  {

    $this->data_type = 'TINYINT';

    return $this->length($length);

  }

  public function smallInt(?int $length = null): static
  {

    $this->data_type = 'SMALLINT';

    return $this->length($length);

  }

  public function mediumInt(?int $length = null): static
  {

    $this->data_type = 'MEDIUMINT';

    return $this->length($length);

  }

  public function int(?int $length = null): static
  {

    $this->data_type = 'INTEGER';

    return $this->length($length);

  }

  public function bigInt(?int $length = null): static
  {

    $this->data_type = 'BIGINT';

    return $this->length($length);

  }

  public function decimal(
    ?int $length = null,
    ?int $decimals = null
  ): static
  {

    $this->data_type = 'DECIMAL';

    return $this->length($length, $decimals);

  }

  public function float(
    ?int $length = null,
    ?int $decimals = null
  ): static
  {

    $this->data_type = 'FLOAT';

    return $this->length($length, $decimals);

  }

  public function double(
    ?int $length = null,
    ?int $decimals = null
  ): static
  {

    $this->data_type = 'DOUBLE PRECISION';

    return $this->length($length, $decimals);

  }

  public function bit(?int $length = null): static
  {

    $this->data_type = 'BIT';

    return $this->length($length);

  }

  public function binary(int $length): static
  {

    $this->data_type = 'BINARY';

    return $this->length($length);

  }

  public function blob(?int $length = null): static
  {

    $this->data_type = 'BLOB';

    return $this->length($length);

  }

  public function char(?int $length = null): static
  {

    $this->data_type = 'CHAR';

    return $this->length($length);

  }

  public function enum(string|HasBindings|array|null $values = null): static
  {

    $this->data_type = 'ENUM';

    return $this->values($values);

  }

  public function inet4(): static
  {

    $this->data_type = 'INET4';

    return $this;

  }

  public function inet6(): static
  {

    $this->data_type = 'INET6';

    return $this;

  }

  public function mediumBlob(): static
  {

    $this->data_type = 'MEDIUMBLOB';

    return $this;

  }

  public function mediumText(): static
  {

    $this->data_type = 'MEDIUMTEXT';

    return $this;

  }

  public function longBlob(): static
  {

    $this->data_type = 'LONGBLOB';

    return $this;

  }

  public function longText(): static
  {

    $this->data_type = 'LONGTEXT';

    return $this;

  }

  public function text(?int $length = null): static
  {

    $this->data_type = 'TEXT';

    return $this->length($length);

  }

  public function tinyBlob(): static
  {

    $this->data_type = 'TINYBLOB';

    return $this;

  }

  public function tinyText(): static
  {

    $this->data_type = 'TINYTEXT';

    return $this;

  }

  public function varbinary(?int $length = null): static
  {

    $this->data_type = 'VARBINARY';

    return $this->length($length);

  }

  public function varchar(?int $length = null): static
  {

    $this->data_type = 'VARCHAR';

    return $this->length($length);

  }

  public function set(string|HasBindings|array|null $values = null): static
  {

    $this->data_type = 'SET';

    return $this->values($values);

  }

  public function uuid(): static
  {

    $this->data_type = 'UUID';

    return $this;

  }

  public function date(): static
  {

    $this->data_type = 'DATE';

    return $this;

  }

  public function time(?int $precision = null): static
  {

    $this->data_type = 'TIME';

    return $this->length($precision);

  }

  public function datetime(?int $precision = null): static
  {

    $this->data_type = 'DATETIME';

    return $this->length($precision);

  }

  public function timestamp(?int $precision = null): static
  {

    $this->data_type = 'TIMESTAMP';

    return $this->length($precision);

  }

  public function year(?int $length = null): static
  {

    $this->data_type = 'YEAR';

    return $this->length($length);

  }

  public function point(): static
  {

    $this->data_type = 'POINT';

    return $this;

  }

  public function lineString(): static
  {

    $this->data_type = 'LINESTRING';

    return $this;

  }

  public function polygon(): static
  {

    $this->data_type = 'POLYGON';

    return $this;

  }

  public function multiPoint(): static
  {

    $this->data_type = 'MULTIPOINT';

    return $this;

  }

  public function multiLineString(): static
  {

    $this->data_type = 'MULTILINESTRING';

    return $this;

  }

  public function multiPolygon(): static
  {

    $this->data_type = 'MULTIPOLYGON';

    return $this;

  }

  public function geometryCollection(): static
  {

    $this->data_type = 'GEOMETRYCOLLECTION';

    return $this;

  }

  public function json(): static
  {

    $this->data_type = 'JSON';

    return $this;

  }

  public function integer(?int $length = null): static
  {

    $this->data_type = 'INTEGER';

    return $this->length($length);

  }

  public function any(): static
  {

    $this->data_type = 'ANY';

    return $this;

  }

  public function bigSerial(): static
  {

    $this->data_type = 'BIGSERIAL';

    return $this;

  }

  public function varbit(?int $length = null): static
  {

    $this->data_type = 'VARBIT';

    return $this->length($length);

  }

  public function boolean(): static
  {

    $this->data_type = 'BOOLEAN';

    return $this;

  }

  public function box(): static
  {

    $this->data_type = 'BOX';

    return $this;

  }

  public function bytea(): static
  {

    $this->data_type = 'BYTEA';

    return $this;

  }

  public function cidr(): static
  {

    $this->data_type = 'CIDR';

    return $this;

  }

  public function circle(): static
  {

    $this->data_type = 'CIRCLE';

    return $this;

  }

  public function interval(?int $precision = null): static
  {

    $this->data_type = 'INTERVAL';

    return $this->length($precision);

  }

  public function intervalYear(): static
  {

    $this->data_type = 'INTERVAL YEAR';

    return $this;

  }

  public function intervalMonth(): static
  {

    $this->data_type = 'INTERVAL MONTH';

    return $this;

  }

  public function intervalDay(): static
  {

    $this->data_type = 'INTERVAL DAY';

    return $this;

  }

  public function intervalHour(): static
  {

    $this->data_type = 'INTERVAL HOUR';

    return $this;

  }

  public function intervalMinute(): static
  {

    $this->data_type = 'INTERVAL MINUTE';

    return $this;

  }

  public function intervalSecond(?int $precision = null): static
  {

    $this->data_type = 'INTERVAL SECOND';

    return $this->length($precision);

  }

  public function intervalYearToMonth(): static
  {

    $this->data_type = 'INTERVAL YEAR TO MONTH';

    return $this;

  }

  public function intervalDayToHour(): static
  {

    $this->data_type = 'INTERVAL DAY TO HOUR';

    return $this;

  }

  public function intervalDayToMinute(): static
  {

    $this->data_type = 'INTERVAL DAY TO MINUTE';

    return $this;

  }

  public function intervalDayToSecond(?int $precision = null): static
  {

    $this->data_type = 'INTERVAL DAY TO SECOND';

    return $this->length($precision);

  }

  public function intervalHourToMinute(): static
  {

    $this->data_type = 'INTERVAL HOUR TO MINUTE';

    return $this;

  }

  public function intervalHourToSecond(?int $precision = null): static
  {

    $this->data_type = 'INTERVAL HOUR TO SECOND';

    return $this->length($precision);

  }

  public function intervalMinuteToSecond(?int $precision = null): static
  {

    $this->data_type = 'INTERVAL MINUTE TO SECOND';

    return $this->length($precision);

  }

  public function jsonb(): static
  {

    $this->data_type = 'JSONB';

    return $this;

  }

  public function line(): static
  {

    $this->data_type = 'LINE';

    return $this;

  }

  public function lseg(): static
  {

    $this->data_type = 'LSEG';

    return $this;

  }

  public function macaddr(): static
  {

    $this->data_type = 'MACADDR';

    return $this;

  }

  public function macaddr8(): static
  {

    $this->data_type = 'MACADDR8';

    return $this;

  }

  public function money(): static
  {

    $this->data_type = 'MONEY';

    return $this;

  }

  public function path(): static
  {

    $this->data_type = 'PATH';

    return $this;

  }

  public function pglsn(): static
  {

    $this->data_type = 'PG_LSN';

    return $this;

  }

  public function pgSnapshot(): static
  {

    $this->data_type = 'PG_SNAPSHOT';

    return $this;

  }

  public function real(): static
  {

    $this->data_type = 'REAL';

    return $this;

  }

  public function smallSerial(): static
  {

    $this->data_type = 'SMALLSERIAL';

    return $this;

  }

  public function serial(): static
  {

    $this->data_type = 'SERIAL';

    return $this;

  }

  public function timeWithTimeZone(?int $precision = null): static
  {

    $this->data_type = 'TIME';

    $this->withTimeZone();

    return $this->length($precision);

  }

  public function timestampWithTimeZone(?int $precision = null): static
  {

    $this->data_type = 'TIMESTAMP';

    $this->withTimeZone();

    return $this->length($precision);

  }

  public function tsQuery(): static
  {

    $this->data_type = 'TSQUERY';

    return $this;

  }

  public function tsVector(): static
  {

    $this->data_type = 'TSVECTOR';

    return $this;

  }

  public function xml(): static
  {

    $this->data_type = 'XML';

    return $this;

  }

  public function smallMoney(): static
  {

    $this->data_type = 'SMALLMONEY';

    return $this;

  }

  public function datetimeOffset(?int $precision = null): static
  {

    $this->data_type = 'DATETIMEOFFSET';

    return $this->length($precision);

  }

  public function datetime2(?int $precision = null): static
  {

    $this->data_type = 'DATETIME2';

    return $this->length($precision);

  }

  public function smallDatetime(): static
  {

    $this->data_type = 'SMALLDATETIME';

    return $this;

  }

  public function nchar(?int $length = null): static
  {

    $this->data_type = 'NCHAR';

    return $this->length($length);

  }

  public function nvarchar(?int $length = null): static
  {

    $this->data_type = 'NVARCHAR';

    return $this->length($length);

  }

  public function rowVersion(): static
  {

    $this->data_type = 'ROWVERSION';

    return $this;

  }

  public function hierarchyID(): static
  {

    $this->data_type = 'HIERARCHYID';

    return $this;

  }

  public function uniqueIdentifer(): static
  {

    $this->data_type = 'UNIQUEIDENTIFIER';

    return $this;

  }

  public function sqlVariant(): static
  {

    $this->data_type = 'SQL_VARIANT';

    return $this;

  }

  public function geometry(): static
  {

    $this->data_type = 'GEOMETRY';

    return $this;

  }

  public function geography(): static
  {

    $this->data_type = 'GEOGRAPHY';

    return $this;

  }

  public function length(
    ?int $length = null,
    ?int $decimals = null
  ): static
  {

    $this->length = $length;
    $this->decimals = $decimals;

    return $this;

  }

  public function values(string|HasBindings|array $values = null): static
  {

    $values = is_array($values) ? $values : [$values];

    foreach ($values as $value)
    {

      if (is_string($value))
      {
        $value = "'" . str_replace("'", "''", $value) . "'";
      }

      $this->values[] = $value;

    }

    return $this;

  }

  public function withTimeZone(): static
  {

    $this->with_time_zone = 'WITH TIME ZONE';

    return $this;

  }

  protected function getWithTimeZone(): string
  {
    return $this->with_time_zone;
  }

  protected function getValues(): string
  {

    if (empty($this->values))
    {
      return '';
    }

    $values = implode(', ', $this->values);

    return "($values)";

  }

  protected function getLength(): string
  {

    if (null === $this->length)
    {
      return '';
    }

    $decimals = null === $this->decimals ? '' : ", $this->decimals";

    return "($this->length$decimals)";

  }

  protected function getDataType(): string
  {
    return $this->data_type;
  }

}