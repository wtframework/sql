<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Statements\Select;

class SQL
{

  public function __construct(public readonly DBMS $dbms) {}

  public static function bind(
    mixed $value,
    int $type = \PDO::PARAM_STR
  ): Raw
  {

    return (new Raw(string: '?'))->bind(
      values: $value,
      type: $type
    );

  }

  public static function bindVar(
    mixed &$var,
    int $type = \PDO::PARAM_STR,
    int $max_length = 0,
    mixed $driver_options = null
  ): Raw
  {

    return (new Raw(string: '?'))->bindVar(
      var: $var,
      type: $type,
      max_length: $max_length,
      driver_options: $driver_options
    );

  }

  public static function cte(
    string $name,
    mixed $stmt,
    string|array $columns = []
  ): CTE
  {

    return new CTE(
      name: $name,
      stmt: $stmt,
      column: $columns
    );

  }

  public static function index(string $name = null): Index
  {
    return new Index(name: $name);
  }

  public static function outfile(string $path): Outfile
  {
    return new Outfile(path: $path);
  }

  public static function raw(
    string|int $string,
    mixed $bindings = null
  ): Raw
  {

    return new Raw(
      string: (string) $string,
      bindings: $bindings
    );

  }

  public static function subquery(
    string|Select $stmt,
    string $alias = null,
    mixed $bindings = null
  ): Subquery
  {

    return new Subquery(
      stmt: $stmt,
      alias: $alias,
      bindings: $bindings
    );

  }

  public static function table(
    string $name,
    string $alias = null
  ): Table
  {

    return new Table(
      name: $name,
      alias: $alias
    );

  }

  public static function upsert(): Upsert
  {
    return new Upsert;
  }

  public static function where(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): Where
  {
    return new Where(...func_get_args());
  }

  public static function window(string $name = ''): Window
  {
    return new Window($name);
  }

}