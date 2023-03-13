<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\ForPortionOf;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\Priority;
use WTFramework\SQL\Traits\Quick;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Using;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WhereCurrentOf;
use WTFramework\SQL\Traits\With;

class Delete extends Statement
{

  use Explain;
  use With;
  use Priority;
  use Quick;
  use Ignore;
  use Top;
  use Table;
  use From;
  use Join;
  use Using;
  use ForPortionOf;
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
        'DELETE',
        $this->getPriority(),
        $this->getQuick(),
        $this->getIgnore(),
        $this->getTable(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getUsing(),
        $this->getForPortionOf(),
        $this->getWhere(),
        $this->getOrderBy(),
        $this->getLimit(),
        $this->getReturning(),
      ],

      DBMS::MySQL => [
        $this->getExplain(),
        'DELETE',
        $this->getPriority(),
        $this->getQuick(),
        $this->getIgnore(),
        $this->getTable(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getOrderBy(),
        $this->getLimit(),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        $this->getWith(),
        'DELETE',
        $this->getFrom(),
        $this->getWhere(),
        $this->getReturning(),
        $this->getOrderBy(),
        $this->getLimit(),
      ],

      DBMS::PostgreSQL => [
        $this->getExplain(),
        $this->getWith(),
        'DELETE',
        $this->getFrom(),
        $this->getUsing(),
        $this->getWhere(),
        $this->getWhereCurrentOf(),
        $this->getReturning(),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        $this->getWith(),
        'DELETE',
        $this->getTop(),
        $this->getTable(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getWhereCurrentOf(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support DELETE"
        ),

    };

  }

}