<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\SQL;

trait DefaultValue
{

  protected string|int|float|null|HasBindings $default = null;

  public function default(string|int|float|null|HasBindings $expression): static
  {

    if (is_string($expression))
    {
      $expression = "'" . SQL::escape($expression) . "'";
    }

    $this->default = (string) ($expression ?? "NULL");

    return $this;

  }

  protected function getDefault(): string
  {

    if (null === $this->default)
    {
      return '';
    }

    return "DEFAULT ($this->default)";

  }

}