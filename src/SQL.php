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
use WTFramework\SQL\Services\Subpartition;
use WTFramework\SQL\Services\Window;
use WTFramework\SQL\Simple\SQL as SimpleSQL;
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

abstract class SQL extends SimpleSQL
{

  public static function alter(): Alter
  {
    return (new Alter)->use(static::grammar());
  }

  public static function create(): Create
  {
    return (new Create)->use(static::grammar());
  }

  public static function createIndex(string $index): CreateIndex
  {
    return (new CreateIndex($index))->use(static::grammar());
  }

  public static function delete(): Delete
  {
    return (new Delete)->use(static::grammar());
  }

  public static function drop(): Drop
  {
    return (new Drop)->use(static::grammar());
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

  public static function truncate(): Truncate
  {
    return (new Truncate)->use(static::grammar());
  }

  public static function update(): Update
  {
    return (new Update)->use(static::grammar());
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

  public static function subpartition(string $name): Subpartition
  {
    return new Subpartition($name);
  }

  public static function window(string $name = ''): Window
  {
    return new Window($name);
  }

}