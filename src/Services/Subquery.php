<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Alias;
use WTFramework\SQL\Traits\All;
use WTFramework\SQL\Traits\Any;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Exists;
use WTFramework\SQL\Traits\ForSystemTime;
use WTFramework\SQL\Traits\Lateral;

class Subquery implements HasBindings
{

  use Alias;
  use All;
  use Any;
  use Bind;
  use Column;
  use Exists;
  use ForSystemTime;
  use Lateral;

  public function __construct(public readonly string|HasBindings $stmt) {}

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
      $this->getExists() ?: $this->getAll() ?: $this->getAny() ?: $this->getLateral(),
      $this->getStmt(),
      $this->getForSystemTime(),
      $this->getAlias(),
      $this->getColumn(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}