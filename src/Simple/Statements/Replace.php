<?php

declare(strict_types=1);

namespace WTFramework\SQL\Simple\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\Select;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\Values;

class Replace extends Statement
{

  use Column;
  use Into;
  use Select;
  use Set;
  use Values;

  protected function toArray(): array
  {

    return [
      "REPLACE",
      $this->getInto(),
      $this->getColumn(),
      $this->getSelect() ?: $this->getSet() ?: $this->getValues($this->grammar()->defaultValues()),
    ];

  }

}