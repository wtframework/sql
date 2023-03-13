<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\OnConstraint;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\TargetWhere;
use WTFramework\SQL\Traits\Where;

class Upsert implements HasBindings
{

  use Bind;
  use Column;
  use OnConstraint;
  use TargetWhere;
  use Where;
  use Set;

  protected function getUpdateOrNothing(): string
  {
    return empty($this->set) ? 'NOTHING' : 'UPDATE';
  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter([
      $this->getColumn() ?: $this->getOnConstraint(),
      $this->getTargetWhere(),
      'DO',
      $this->getUpdateOrNothing(),
      $this->getSet(),
      $this->getWhere()
    ]));

  }

}