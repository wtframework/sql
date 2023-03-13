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

    if (!($expression instanceof HasBindings))
    {
      $expression = SQL::bind($expression);
    }

    $this->default = $expression;

    return $this;

  }

  protected function getDefaultValue(): string
  {

    if (null === $this->default)
    {
      return '';
    }

    $default = (string) $this->default;

    if ($this->default instanceof HasBindings)
    {
      $this->mergeBindings(from: $this->default);
    }

    return "DEFAULT ($default)";

  }

}