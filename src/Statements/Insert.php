<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\ConflictOr;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\OnConflictUpsert;
use WTFramework\SQL\Traits\OnDuplicateKeyUpdate;
use WTFramework\SQL\Traits\Overriding;
use WTFramework\SQL\Traits\Priority;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\RowAlias;
use WTFramework\SQL\Traits\Select;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Values;
use WTFramework\SQL\Traits\With;

class Insert extends Statement
{

  use Explain;
  use With;
  use Priority;
  use Ignore;
  use ConflictOr;
  use Top;
  use Into;
  use Column;
  use Overriding;
  use Values;
  use Set;
  use Select;
  use RowAlias;
  use OnDuplicateKeyUpdate;
  use OnConflictUpsert;
  use Returning;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        'INSERT',
        $this->getPriority(),
        $this->getIgnore(),
        $this->getInto(),
        $this->getColumn(),
        $this->getSelect() ?: $this->getSet() ?: $this->getValues(),
        $this->getOnDuplicateKeyUpdate(),
        $this->getReturning(),
      ],

      DBMS::MySQL => [
        $this->getExplain(),
        'INSERT',
        $this->getPriority(),
        $this->getIgnore(),
        $this->getInto(),
        $this->getColumn(),
        $this->getSelect() ?: $this->getSet() ?: $this->getValues(),
        $this->getRowAlias(),
        $this->getOnDuplicateKeyUpdate(),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        $this->getWith(),
        'INSERT',
        $this->getOr(),
        $this->getInto(),
        $this->getColumn(),
        $this->getSelect() ?: $this->getValues(),
        $this->getOnConflictUpsert(),
        $this->getReturning(),
      ],

      DBMS::PostgreSQL => [
        $this->getExplain(),
        $this->getWith(),
        'INSERT',
        $this->getInto(),
        $this->getColumn(),
        $this->getOverriding(),
        $this->getSelect() ?: $this->getValues(),
        $this->getOnConflictUpsert(),
        $this->getReturning(),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        $this->getWith(),
        'INSERT',
        $this->getTop(),
        $this->getInto(),
        $this->getColumn(),
        $this->getSelect() ?: $this->getValues(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support INSERT"
        ),

    };

  }

}