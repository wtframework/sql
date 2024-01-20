<?php

declare(strict_types=1);

namespace WTFramework\SQL\Simple\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\OnConflictUpsert;
use WTFramework\SQL\Traits\OnDuplicateKeyUpdate;
use WTFramework\SQL\Traits\OrOnConflict;
use WTFramework\SQL\Traits\OrReplace;
use WTFramework\SQL\Traits\Select;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Values;

class Insert extends Statement
{

  use Column;
  use Ignore;
  use Into;
  use OnConflictUpsert;
  use OnDuplicateKeyUpdate;
  use OrOnConflict;
  use OrReplace;
  use Select;
  use Set;
  use Top;
  use Values;

  protected function toArray(): array
  {

    return [
      "INSERT",
      $this->getIgnore() ?: $this->getOr() ?: $this->getOrReplace(),
      $this->getTop(),
      $this->getInto(),
      $this->getColumn(),
      $this->getSelect() ?: $this->getSet() ?: $this->getValues($this->grammar()->defaultValues()),
      $this->getOnDuplicateKeyUpdate(),
      $this->getOnConflictUpsert(),
    ];

  }

}