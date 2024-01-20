<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Simple\Statements\Insert as SimpleInsert;
use WTFramework\SQL\Traits\Delayed;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\HighPriority;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\Overriding;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\RowAlias;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\Values;
use WTFramework\SQL\Traits\With;

class Insert extends SimpleInsert
{

  use Delayed;
  use Explain;
  use HighPriority;
  use IfElse;
  use LowPriority;
  use Overriding;
  use Returning;
  use RowAlias;
  use SetStatement;
  use Values;
  use With;

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getSetStatement(),
      $this->getExplain(),
      $this->getWith(),
      "INSERT",
      $this->getLowPriority() ?: $this->getDelayed() ?: $this->getHighPriority(),
      $this->getIgnore() ?: $this->getOr() ?: $this->getOrReplace(),
      $this->getTop(),
      $this->getInto(),
      $this->getColumn(),
      $this->getOverriding(),
      $this->getSelect() ?: $this->getSet() ?: $this->getValues($this->grammar()->defaultValues()),
      $this->getRowAlias(),
      $this->getOnDuplicateKeyUpdate(),
      $this->getOnConflictUpsert(),
      $this->getReturning(),
      $this->getElse(),
    ];

  }

}