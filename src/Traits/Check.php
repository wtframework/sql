<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Check
{

  protected array $check = [];

  public function check(string|HasBindings|array $expression): static
  {

    $expressions = is_array($expression) ? $expression : [$expression];

    foreach ($expressions as $expression)
    {
      $this->check[] = $expression;
    }

    return $this;

  }

  protected function getCheck(): string
  {

    if (empty($this->check))
    {
      return '';
    }

    foreach ($this->check as $expression)
    {

      $check[] = "CHECK ($expression)";

      if ($expression instanceof HasBindings)
      {
        $this->mergeBindings($expression);
      }

    }

    return implode(', ', $check);

  }

}