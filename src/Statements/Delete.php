<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\BeforeSystemTime;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\ForPortionOf;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\History;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\Offset;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\Quick;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Using;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WhereCurrentOf;
use WTFramework\SQL\Traits\With;

class Delete extends Statement
{

  use BeforeSystemTime;
  use Explain;
  use ForPortionOf;
  use From;
  use History;
  use IfElse;
  use Ignore;
  use LowPriority;
  use Join;
  use Limit;
  use Offset;
  use OrderBy;
  use Quick;
  use Returning;
  use SetStatement;
  use Table;
  use Top;
  use Using;
  use Where;
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