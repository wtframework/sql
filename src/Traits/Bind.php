<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Bind
{

  protected array $bindings = [];

  public function bind(string|int|float|array $value): static
  {

    foreach ((array) $value as $v)
    {
      $this->bindings[] = $v;
    }

    return $this;

  }

  public function mergeBindings(HasBindings $from): void
  {

    foreach ($from->bindings() as $binding)
    {
      $this->bindings[] = $binding;
    }

  }

  public function bindings(): array
  {
    return $this->bindings;
  }

}