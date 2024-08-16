<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Cascade;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\Only;
use WTFramework\SQL\Traits\RestartIdentity;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Wait;

class Truncate extends Statement
{

  use Cascade;
  use Explain;
  use IfElse;
  use Only;
  use RestartIdentity;
  use Table;
  use SetStatement;
  use Wait;

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getSetStatement(),
      $this->getExplain(),
      "TRUNCATE TABLE",
      $this->getOnly(),
      $this->getTable(),
      $this->getRestartIdentity(),
      $this->getCascade(),
      $this->getWait(),
      $this->getElse(),
    ];

  }

}