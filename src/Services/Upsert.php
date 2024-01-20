<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\OnConstraint;
use WTFramework\SQL\Traits\Set;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WhereIndex;

class Upsert implements HasBindings
{

  use Bind;
  use Column;
  use OnConstraint;
  use Set;
  use Where;
  use WhereIndex;

  protected function getUpdateOrNothing(): string
  {
    return empty($this->set) ? 'NOTHING' : 'UPDATE';
  }

  protected function toArray(): array
  {

    return [
      $this->getColumn() ?: $this->getOnConstraint(),
      $this->getWhereIndex(),
      'DO',
      $this->getUpdateOrNothing(),
      $this->getSet(),
      $this->getWhere(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}