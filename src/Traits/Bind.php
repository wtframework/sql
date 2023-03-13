<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Bind
{

  protected array $bindings = [];

  public function bind(
    mixed $values,
    int $type = \PDO::PARAM_STR
  ): static
  {

    foreach ((array) $values as $value)
    {

      $this->bindings[] = [
        'value' => $value,
        'type' => $type,
      ];

    }

    return $this;

  }

  public function bindVar(
    mixed &$var,
    int $type = \PDO::PARAM_STR,
    int $max_length = 0,
    mixed $driver_options = null
  ): static
  {

    $this->bindings[] = [
      'var' => &$var,
      'type' => $type,
      'maxLength' => $max_length,
      'driverOptions' => $driver_options,
    ];

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