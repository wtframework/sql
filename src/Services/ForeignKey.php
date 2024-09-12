<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\ForeignKeyMatch;
use WTFramework\SQL\Traits\IndexName;
use WTFramework\SQL\Traits\OnDelete;
use WTFramework\SQL\Traits\OnUpdate;
use WTFramework\SQL\Traits\References;

class ForeignKey implements HasBindings
{

  use Bind;
  use Column;
  use ForeignKeyMatch;
  use IndexName;
  use OnDelete;
  use OnUpdate;
  use References;

  public function __construct(string|array $column)
  {
    $this->column($column);
  }

  protected function toArray(): array
  {

    return [
      "FOREIGN KEY",
      $this->getIndexName(),
      $this->getColumn(),
      $this->getReferences(),
      $this->getMatch(),
      $this->getOnDelete(),
      $this->getOnUpdate(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}