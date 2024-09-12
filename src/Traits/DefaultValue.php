<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\SQL;

trait DefaultValue
{

  protected string|int|float|null $default = null;

  public function default(string|int|float $expression): static
  {

    if (is_string($expression))
    {
      $expression = "'" . SQL::escape($expression) . "'";
    }

    $this->default = $expression;

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