<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\DBMS;

trait ColumnAutoIncrement
{

  protected string $auto_increment = '';

  public function autoIncrement(): static
  {

    $this->auto_increment = match ($this->dbms)
    {
      DBMS::SQLite => "AUTOINCREMENT",
      default => "AUTO_INCREMENT",
    };

    return $this;

  }

  protected function getColumnAutoIncrement(): string
  {
    return $this->auto_increment;
  }

}