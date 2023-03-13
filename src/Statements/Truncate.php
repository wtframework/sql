<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Cascade;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\RestartIdentity;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Wait;

class Truncate extends Statement
{

  use Explain;
  use Table;
  use Wait;
  use RestartIdentity;
  use Cascade;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        'TRUNCATE TABLE',
        $this->getTable(),
        $this->getWait(),
      ],

      DBMS::MySQL => [
        'TRUNCATE TABLE',
        $this->getTable(),
      ],

      DBMS::PostgreSQL => [
        'TRUNCATE TABLE',
        $this->getTable(),
        $this->getRestartIdentity(),
        $this->getCascade(),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        'TRUNCATE TABLE',
        $this->getTable(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support TRUNCATE TABLE"
        ),

    };

  }

}