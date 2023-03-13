<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Alias;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Lateral;

class Subquery implements HasBindings
{

  use Lateral;
  use Alias;
  use Bind;

  public function __construct(
    public readonly string|HasBindings $stmt,
    string $alias = null,
    mixed $bindings = null
  )
  {

    if (null !== $alias)
    {
      $this->alias(alias: $alias);
    }

    if (null !== $bindings)
    {
      $this->bind(values: $bindings);
    }

  }

  public function __toString(): string
  {

    $stmt = (string) $this->stmt;

    if ($this->stmt instanceof HasBindings)
    {

      $this->bindings = [];

      $this->mergeBindings(from: $this->stmt);

    }

    return implode(' ', array_filter([
      $this->getLateral(),
      "($stmt)",
      $this->getAlias()
    ]));

  }

}