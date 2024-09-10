<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Column;
use WTFramework\SQL\Services\Constraint;
use WTFramework\SQL\Services\CTE;
use WTFramework\SQL\Services\Index;
use WTFramework\SQL\Services\Outfile;
use WTFramework\SQL\Services\Partition;
use WTFramework\SQL\Services\Raw;
use WTFramework\SQL\Services\Subpartition;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\Services\Table;
use WTFramework\SQL\Services\Upsert;
use WTFramework\SQL\Services\Window;
use WTFramework\SQL\Statements\Alter;
use WTFramework\SQL\Statements\Create;
use WTFramework\SQL\Statements\CreateIndex;
use WTFramework\SQL\Statements\Delete;
use WTFramework\SQL\Statements\Drop;
use WTFramework\SQL\Statements\DropIndex;
use WTFramework\SQL\Statements\Insert;
use WTFramework\SQL\Statements\Replace;
use WTFramework\SQL\Statements\Select;
use WTFramework\SQL\Statements\Truncate;
use WTFramework\SQL\Statements\Update;
use WTFramework\SQL\Traits\Macroable;
use WTFramework\SQL\Traits\StaticUseGrammar;

abstract class SQL
{

  use Macroable;
  use StaticUseGrammar;

  public static function alter(string|HasBindings|null $table = null): Alter
  {
    return (new Alter($table))->use(static::grammar());
  }

  public static function create(string|HasBindings|null $table = null): Create
  {
    return (new Create($table))->use(static::grammar());
  }

  public static function createIndex(string $index): CreateIndex
  {
    return (new CreateIndex($index))->use(static::grammar());
  }

  public static function delete(): Delete
  {
    return (new Delete)->use(static::grammar());
  }

  public static function drop(string|HasBindings|null $table = null): Drop
  {
    return (new Drop($table))->use(static::grammar());
  }

  public static function dropIndex(string|array $index): DropIndex
  {
    return (new DropIndex($index))->use(static::grammar());
  }

  public static function insert(): Insert
  {
    return (new Insert)->use(static::grammar());
  }

  public static function replace(): Replace
  {
    return (new Replace)->use(static::grammar());
  }

  public static function select(): Select
  {
    return (new Select)->use(static::grammar());
  }

  public static function truncate(string|HasBindings|null $table = null): Truncate
  {
    return (new Truncate($table))->use(static::grammar());
  }

  public static function update(): Update
  {
    return (new Update)->use(static::grammar());
  }

  public static function bind(string|int|float $value): Raw
  {
    return (new Raw('?'))->bind($value);
  }

  public static function column(string $name): Column
  {
    return (new Column($name))->use(static::grammar());
  }

  public static function constraint(string $name = ''): Constraint
  {
    return new Constraint($name);
  }

  public static function cte(
    string $name,
    string|HasBindings $stmt
  ): CTE
  {
    return new CTE($name, $stmt);
  }

  public static function index(string $name = ''): Index
  {
    return new Index($name);
  }

  public static function outfile(string $path): Outfile
  {
    return new Outfile($path);
  }

  public static function partition(string $name): Partition
  {
    return new Partition($name);
  }

  public static function raw(
    string $string,
    string|int|float|array $bindings = []
  ): Raw
  {
    return new Raw($string, $bindings);
  }

  public static function subpartition(string $name): Subpartition
  {
    return new Subpartition($name);
  }

  public static function subquery(string|HasBindings $stmt): Subquery
  {
    return new Subquery($stmt);
  }

  public static function table(string $name): Table
  {
    return new Table($name);
  }

  public static function upsert(): Upsert
  {
    return new Upsert;
  }

  public static function window(string $name = ''): Window
  {
    return new Window($name);
  }

}