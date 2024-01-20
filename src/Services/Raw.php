<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;

class Raw implements HasBindings
{

  use Bind;

  public function __construct(public readonly string $string) {}

  public function __toString(): string
  {
    return $this->string;
  }

}