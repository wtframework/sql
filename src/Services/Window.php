<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\FrameSpec;
use WTFramework\SQL\Traits\Macroable;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\WindowPartitionBy;

class Window implements HasBindings
{

  use Bind;
  use FrameSpec;
  use Macroable;
  use OrderBy;
  use WindowPartitionBy;

  public function __construct(public readonly string $name = '') {}

  protected function toArray(): array
  {

    return [
      $this->name,
      $this->getPartitionBy(),
      $this->getOrderBy(),
      $this->getFrameSpec(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}