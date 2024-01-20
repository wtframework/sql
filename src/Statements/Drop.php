<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Cascade;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\IfExists;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Temporary;
use WTFramework\SQL\Traits\Wait;

class Drop extends Statement
{

  use Cascade;
  use Explain;
  use IfElse;
  use IfExists;
  use SetStatement;
  use Table;
  use Temporary;
  use Wait;

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getSetStatement(),
      $this->getExplain(),
      "DROP",
      $this->getTemporary(),
      "TABLE",
      $this->getIfExists(),
      $this->getTable(),
      $this->getCascade(),
      $this->getWait(),
      $this->getElse(),
    ];

  }

}