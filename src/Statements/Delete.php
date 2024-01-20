<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Simple\Statements\Delete as SimpleDelete;
use WTFramework\SQL\Traits\BeforeSystemTime;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\ForPortionOf;
use WTFramework\SQL\Traits\History;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\Quick;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\WhereCurrentOf;
use WTFramework\SQL\Traits\With;

class Delete extends SimpleDelete
{

  use BeforeSystemTime;
  use Explain;
  use ForPortionOf;
  use History;
  use IfElse;
  use LowPriority;
  use Quick;
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
      "DELETE",
      $this->getLowPriority(),
      $this->getQuick(),
      $this->getIgnore(),
      $this->getHistory(),
      $this->getTop(),
      $this->getTable(),
      $this->getFrom(),
      $this->getJoin(),
      $this->getUsing(),
      $this->getForPortionOf(),
      $this->getBeforeSystemTime(),
      $this->getWhere() ?: $this->getWhereCurrentOf(),
      $this->grammar()->deleteReturningBeforeOrderBy() ? $this->getReturning() : null,
      $this->getOrderBy(),
      $this->getLimit(),
      $this->getOffset(),
      $this->grammar()->deleteReturningBeforeOrderBy() ? null : $this->getReturning(),
      $this->getElse(),
    ];

  }

}