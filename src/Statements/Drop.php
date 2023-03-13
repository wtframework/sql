<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Cascade;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\IfExists;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Temporary;
use WTFramework\SQL\Traits\Wait;

class Drop extends Statement
{

  use Explain;
  use Temporary;
  use IfExists;
  use Table;
  use Wait;
  use Cascade;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        'DROP',
        $this->getTemporary(),
        'TABLE',
        $this->getIfExists(),
        $this->getTable(),
        $this->getWait(),
        $this->getCascade(),
      ],

      DBMS::MySQL => [
        'DROP',
        $this->getTemporary(),
        'TABLE',
        $this->getIfExists(),
        $this->getTable(),
        $this->getCascade(),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        'DROP TABLE',
        $this->getIfExists(),
        $this->getTable(),
      ],

      DBMS::PostgreSQL => [
        'DROP TABLE',
        $this->getIfExists(),
        $this->getTable(),
        $this->getCascade(),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        'DROP TABLE',
        $this->getIfExists(),
        $this->getTable(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support DROP TABLE"
        ),

    };

  }

}