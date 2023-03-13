<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Traits\Alias;
use WTFramework\SQL\Traits\IndexHint;
use WTFramework\SQL\Traits\Only;
use WTFramework\SQL\Traits\Partition;

class Table
{

  use Only;
  use Partition;
  use Alias;
  use IndexHint;

  public function __construct(
    public readonly string $name,
    string $alias = null
  )
  {

    if (null !== $alias)
    {
      $this->alias(alias: $alias);
    }

  }

  public function __toString(): string
  {

    return implode(' ', array_filter([
      $this->getOnly(),
      $this->name,
      $this->getPartition(),
      $this->getAlias(),
      $this->getIndexHint()
    ]));

  }

}