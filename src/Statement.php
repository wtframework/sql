<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Macroable;
use WTFramework\SQL\Traits\UseGrammar;
use WTFramework\SQL\Traits\When;

abstract class Statement implements HasBindings
{

  use Bind;
  use Macroable;
  use UseGrammar;
  use When;

  public function __construct() {}

  abstract protected function toArray(): array;

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}