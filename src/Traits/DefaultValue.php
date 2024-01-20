<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\SQL;

trait DefaultValue
{

  protected string|int|HasBindings|null $default = null;

  public function default(string|int|HasBindings $expression): static
  {

    if (is_string($expression))
    {
      $expression = SQL::bind($expression);
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

    $default = (string) $this->default;

    if ($this->default instanceof HasBindings)
    {
      $this->mergeBindings($this->default);
    }

    return "DEFAULT ($default)";

  }

}