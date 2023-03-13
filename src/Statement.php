<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;

abstract class Statement implements HasBindings
{

  use Bind;

  public function __construct(protected DBMS $dbms) {}

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->grammar()));

  }

  abstract protected function grammar(): array;

}