<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Simple\Statements\Replace as SimpleReplace;
use WTFramework\SQL\Traits\Delayed;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\With;

class Replace extends SimpleReplace
{

  use Delayed;
  use Explain;
  use IfElse;
  use LowPriority;
  use Returning;
  use SetStatement;
  use With;

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