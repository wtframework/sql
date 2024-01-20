<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\IsGrammar;

enum Grammar implements IsGrammar
{

  case MariaDB;
  case MySQL;
  case PostgreSQL;
  case SQLite;
  case TSQL;

  public function useTop(): bool
  {

    return match ($this)
    {
      static::TSQL => true,
      default => false,
    };

  }

  public function defaultValues(): string
  {

    return match ($this)
    {
      static::MySQL, static::MariaDB => 'VALUES ()',
      default => 'DEFAULT VALUES',
    };

  }

  public function deleteReturningBeforeOrderBy(): bool
  {

    return match ($this)
    {
      static::SQLite => true,
      default => false,
    };

  }

  public function autoIncrement(): string
  {

    return match ($this)
    {
      static::SQLite => 'AUTOINCREMENT',
      default => 'AUTO_INCREMENT',
    };

  }

}