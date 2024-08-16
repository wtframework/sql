<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\ForPortionOf;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\LowPriority;
use WTFramework\SQL\Traits\Offset;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\OrOnConflict;
use WTFramework\SQL\Traits\OrReplace;
use WTFramework\SQL\Traits\Returning;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WhereCurrentOf;
use WTFramework\SQL\Traits\With;

class Update extends Statement
{

  use Explain;
  use ForPortionOf;
  use From;
  use IfElse;
  use Ignore;
  use Join;
  use Limit;
  use LowPriority;
  use Offset;
  use OrderBy;
  use OrOnConflict;
  use OrReplace;
  use Returning;
  use Set;
  use SetStatement;
  use Table;
  use Top;
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