<?php

declare(strict_types=1);

namespace WTFramework\SQL\Simple\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Table;

class Truncate extends Statement
{

  use Table;

  protected function toArray(): array
  {

    return [
      "TRUNCATE TABLE",
      $this->getTable(),
    ];

  }

}