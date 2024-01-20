<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Alias;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\ForSystemTime;
use WTFramework\SQL\Traits\IndexedBy;
use WTFramework\SQL\Traits\IndexHint;
use WTFramework\SQL\Traits\Only;
use WTFramework\SQL\Traits\TablePartition;

class Table implements HasBindings
{

  use Alias;
  use Bind;
  use Column;
  use ForSystemTime;
  use IndexedBy;
  use IndexHint;
  use Only;
  use TablePartition;

  public function __construct(public readonly string $name) {}

  protected function toArray(): array
  {

    return [
      $this->getOnly(),
      $this->name,
      $this->getPartition(),
      $this->getForSystemTime(),
      $this->getAlias(),
      $this->getIndexHint(),
      $this->getColumn(),
      $this->getIndexedBy(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}