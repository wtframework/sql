<?php

declare(strict_types=1);

namespace WTFramework\SQL\Simple\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\Offset;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\OrOnConflict;
use WTFramework\SQL\Traits\OrReplace;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Where;

class Update extends Statement
{

  use From;
  use Ignore;
  use Join;
  use Limit;
  use Offset;
  use OrderBy;
  use OrOnConflict;
  use OrReplace;
  use Set;
  use Table;
  use Top;
  use Where;

  protected function toArray(): array
  {

    return [
      "UPDATE",
      $this->getIgnore() ?: $this->getOr() ?: $this->getOrReplace(),
      $this->getTop(),
      $this->getTable(),
      $this->getFrom(),
      $this->getJoin(),
      $this->getSet(),
      $this->getWhere(),
      $this->getOrderBy(),
      $this->getLimit(),
      $this->getOffset(),
    ];

  }

}