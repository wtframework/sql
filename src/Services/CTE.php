<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Cycle;
use WTFramework\SQL\Traits\CycleRestrict;
use WTFramework\SQL\Traits\Materialized;
use WTFramework\SQL\Traits\Search;

class CTE implements HasBindings
{

  use Bind;
  use Column;
  use Cycle;
  use CycleRestrict;
  use Materialized;
  use Search;

  public function __construct(
    public readonly string $name,
    public readonly string|HasBindings $stmt
  ) {}

  protected function getStmt(): string
  {

    $stmt = (string) $this->stmt;

    if ($this->stmt instanceof HasBindings)
    {
      $this->mergeBindings($this->stmt);
    }

    return "($stmt)";

  }

  protected function toArray(): array
  {

    return [
      $this->name,
      $this->getColumn(),
      'AS',
      $this->getMaterialized(),
      $this->getStmt(),
      $this->getCycleRestrict(),
      $this->getSearch(),
      $this->getCycle(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}