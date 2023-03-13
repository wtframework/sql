<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\Priority;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\Select;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\Values;
use WTFramework\SQL\Traits\With;

class Replace extends Statement
{

  use Explain;
  use With;
  use Priority;
  use Into;
  use Column;
  use Values;
  use Set;
  use Select;
  use Returning;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        'REPLACE',
        $this->getPriority(),
        $this->getInto(),
        $this->getColumn(),
        $this->getSelect() ?: $this->getSet() ?: $this->getValues(),
        $this->getReturning(),
      ],

      DBMS::MySQL => [
        $this->getExplain(),
        'REPLACE',
        $this->getPriority(),
        $this->getInto(),
        $this->getColumn(),
        $this->getSelect() ?: $this->getSet() ?: $this->getValues(),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        $this->getWith(),
        'REPLACE',
        $this->getInto(),
        $this->getColumn(),
        $this->getSelect() ?: $this->getValues(),
        $this->getReturning(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support REPLACE"
        ),

    };

  }

}