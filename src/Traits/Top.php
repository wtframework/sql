<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Interfaces\HasBindings;

trait Top
{

  protected int|string|HasBindings $top = '';
  protected string $top_suffix = '';

  public function top(int|string|HasBindings $expression): static
  {

    $this->top = $expression;

    return $this;

  }

  public function topPercent(int|string|HasBindings $expression): static
  {

    $this->top_suffix = ' PERCENT';

    return $this->top($expression);

  }

  public function topWithTies(int|string|HasBindings $expression): static
  {

    $this->top_suffix = ' WITH TIES';

    return $this->top($expression);

  }

  public function topPercentWithTies(int|string|HasBindings $expression): static
  {

    $this->top_suffix = ' PERCENT WITH TIES';

    return $this->top($expression);

  }

  protected function getTop(): string
  {

    if ('' === $this->top || !$this->grammar()->useTop())
    {
      return '';
    }

    $top = (string) $this->top;

    if ($this->top instanceof HasBindings)
    {
      $this->mergeBindings($this->top);
    }

    return "TOP ($top)$this->top_suffix";

  }

}