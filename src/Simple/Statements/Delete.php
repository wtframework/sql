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
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Using;
use WTFramework\SQL\Traits\Where;

class Delete extends Statement
{

  use From;
  use Ignore;
  use Join;
  use Limit;
  use Offset;
  use OrderBy;
  use Table;
  use Top;
  use Using;
  use Where;

  protected function toArray(): array
  {

    return [
      "DELETE",
      $this->getIgnore(),
      $this->getTop(),
      $this->getTable(),
      $this->getFrom(),
      $this->getJoin(),
      $this->getUsing(),
      $this->getWhere(),
      $this->getOrderBy(),
      $this->getLimit(),
      $this->getOffset(),
    ];

  }

}