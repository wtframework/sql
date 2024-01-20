<?php

declare(strict_types=1);

namespace WTFramework\SQL\Simple;

use WTFramework\SQL\Simple\Statements\Delete;
use WTFramework\SQL\Simple\Statements\Insert;
use WTFramework\SQL\Simple\Statements\Replace;
use WTFramework\SQL\Simple\Statements\Select;
use WTFramework\SQL\Simple\Statements\Truncate;
use WTFramework\SQL\Simple\Statements\Update;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Raw;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\Services\Table;
use WTFramework\SQL\Services\Upsert;
use WTFramework\SQL\Traits\StaticUseGrammar;

abstract class SQL
{

  use StaticUseGrammar;

  public static function delete(): Delete
  {
    return (new Delete)->use(static::grammar());
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

  public static function bind(string|int $value): Raw
  {
    return (new Raw('?'))->bind($value);
  }

  public static function raw(string $string): Raw
  {
    return new Raw($string);
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

}