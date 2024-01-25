<?php

declare(strict_types=1);

namespace WTFramework\SQL\Simple\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Distinct;
use WTFramework\SQL\Traits\Expression;
use WTFramework\SQL\Traits\FetchRows;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\GroupBy;
use WTFramework\SQL\Traits\Having;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\Offset;
use WTFramework\SQL\Traits\OffsetRows;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\SetOperation;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\ToSubquery;
use WTFramework\SQL\Traits\Where;

class Select extends Statement
{

  use Distinct;
  use Expression;
  use FetchRows;
  use From;
  use GroupBy;
  use Having;
  use Join;
  use Limit;
  use Offset;
  use OffsetRows;
  use OrderBy;
  use SetOperation;
  use Top;
  use ToSubquery;
  use Where;

  protected function toArray(): array
  {

    return [
      "SELECT",
      $this->getDistinct(),
      $this->getTop(),
      $this->getExpression(),
      $this->getFrom(),
      $this->getJoin(),
      $this->getWhere(),
      $this->getGroupBy(),
      $this->getHaving(),
      $this->getSetOperation(),
      $this->getOrderBy(),
      $this->getLimit() ?: $this->getOffsetRows(),
      $this->getOffset() ?: $this->getFetchRows(),
    ];

  }

}