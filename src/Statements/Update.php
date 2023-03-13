<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\ConflictOr;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\ForPortionOf;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\Priority;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WhereCurrentOf;
use WTFramework\SQL\Traits\With;

class Update extends Statement
{

  use Explain;
  use With;
  use Priority;
  use Ignore;
  use ConflictOr;
  use Top;
  use Table;
  use From;
  use Join;
  use ForPortionOf;
  use Set;
  use Where;
  use WhereCurrentOf;
  use OrderBy;
  use Limit;
  use Returning;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        $this->getExplain(),
        'UPDATE',
        $this->getPriority(),
        $this->getIgnore(),
        $this->getTable(),
        $this->getJoin(),
        $this->getForPortionOf(),
        $this->getSet(),
        $this->getWhere(),
        $this->getOrderBy(),
        $this->getLimit(),
      ],

      DBMS::MySQL => [
        $this->getExplain(),
        'UPDATE',
        $this->getPriority(),
        $this->getIgnore(),
        $this->getTable(),
        $this->getJoin(),
        $this->getSet(),
        $this->getWhere(),
        $this->getOrderBy(),
        $this->getLimit(),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        $this->getWith(),
        'UPDATE',
        $this->getOr(),
        $this->getTable(),
        $this->getSet(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getReturning(),
        $this->getOrderBy(),
        $this->getLimit(),
      ],

      DBMS::PostgreSQL => [
        $this->getExplain(),
        $this->getWith(),
        'UPDATE',
        $this->getTable(),
        $this->getSet(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getWhereCurrentOf(),
        $this->getReturning(),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        $this->getWith(),
        'UPDATE',
        $this->getTop(),
        $this->getTable(),
        $this->getSet(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getWhereCurrentOf(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support UPDATE"
        ),

    };

  }

}