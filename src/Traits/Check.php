<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Check
{

  protected string|HasBindings $check = '';

  public function check(string|HasBindings $expression): static
  {

    $this->check = $expression;

    return $this;

  }

  protected function getCheck(): string
  {

    if ('' === $this->check)
    {
      return '';
    }

    $check = (string) $this->check;

    if ($this->check instanceof HasBindings)
    {
      $this->mergeBindings(from: $this->check);
    }

    return "CHECK ($check)";

  }

}