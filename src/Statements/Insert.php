<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Delayed;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\HighPriority;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\OnConflictUpsert;
use WTFramework\SQL\Traits\OnDuplicateKeyUpdate;
use WTFramework\SQL\Traits\OrOnConflict;
use WTFramework\SQL\Traits\OrReplace;
use WTFramework\SQL\Traits\Overriding;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\RowAlias;
use WTFramework\SQL\Traits\Select;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Values;
use WTFramework\SQL\Traits\With;

class Insert extends Statement
{

  use Column;
  use Delayed;
  use Explain;
  use HighPriority;
  use IfElse;
  use Ignore;
  use Into;
  use LowPriority;
  use OnConflictUpsert;
  use OnDuplicateKeyUpdate;
  use OrOnConflict;
  use OrReplace;
  use Overriding;
  use Returning;
  use RowAlias;
  use Select;
  use Set;
  use SetStatement;
  use Top;
  use Values;
  use With;

  public function __construct(string|HasBindings|array|null $table = null)
  {

    if ($table)
    {
      $this->into($table);
    }

  }

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