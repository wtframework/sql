<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Simple\Statements\Update as SimpleUpdate;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\ForPortionOf;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\WhereCurrentOf;
use WTFramework\SQL\Traits\With;

class Update extends SimpleUpdate
{

  use Explain;
  use ForPortionOf;
  use IfElse;
  use LowPriority;
  use Returning;
  use SetStatement;
  use WhereCurrentOf;
  use With;

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getSetStatement(),
      $this->getExplain(),
      $this->getWith(),
      "UPDATE",
      $this->getLowPriority(),
      $this->getIgnore() ?: $this->getOr() ?: $this->getOrReplace(),
      $this->getTop(),
      $this->getTable(),
      $this->getFrom(),
      $this->getJoin(),
      $this->getForPortionOf(),
      $this->getSet(),
      $this->getWhere() ?: $this->getWhereCurrentOf(),
      $this->getReturning(),
      $this->getOrderBy(),
      $this->getLimit(),
      $this->getOffset(),
      $this->getElse(),
    ];

  }

}