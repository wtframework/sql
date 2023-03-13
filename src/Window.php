<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\FrameSpec;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\PartitionBy;

class Window implements HasBindings
{

  use Bind;
  use PartitionBy;
  use OrderBy;
  use FrameSpec;

  public function __construct(protected string $name = '') {}

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter([
      $this->name,
      $this->getPartitionBy(),
      $this->getOrderBy(),
      $this->getFrameSpec()
    ]));

  }

}