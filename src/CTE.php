<?php

declare(strict_types=1);

namespace WTFramework\SQL;

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
  use Materialized;
  use Search;
  use Cycle;
  use CycleRestrict;

  public function __construct(
    public readonly string $name,
    public readonly string|HasBindings $stmt,
    string|array $column = []
  )
  {

    if (!empty($column))
    {
      $this->column(column: $column);
    }

  }

  protected function getStmt(): string
  {

    $stmt = (string) $this->stmt;

    if ($this->stmt instanceof HasBindings)
    {

      $this->bindings = [];

      $this->mergeBindings(from: $this->stmt);

    }

    return "($stmt)";

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter([
      $this->name,
      $this->getColumn(),
      'AS',
      $this->getMaterialized(),
      $this->getStmt(),
      $this->getSearch(),
      $this->getCycle() ?: $this->getCycleRestrict()
    ]));

  }

}