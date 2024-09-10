<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Delayed;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\Select;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\Values;
use WTFramework\SQL\Traits\With;

class Replace extends Statement
{

  use Column;
  use Delayed;
  use Explain;
  use IfElse;
  use Into;
  use LowPriority;
  use Returning;
  use Select;
  use Set;
  use SetStatement;
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
      "REPLACE",
      $this->getLowPriority() ?: $this->getDelayed(),
      $this->getInto(),
      $this->getColumn(),
      $this->getSelect() ?: $this->getSet() ?: $this->getValues($this->grammar()->defaultValues()),
      $this->getReturning(),
      $this->getElse(),
    ];

  }

}