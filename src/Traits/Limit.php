<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Interfaces\HasBindings;

trait Limit
{

  protected int|string|HasBindings $limit = '';

  public function limit(int|HasBindings $limit): static
  {

    $this->limit = $limit;

    return $this;

  }

  protected function getLimit(): string
  {

    if ('' === $this->limit || $this->grammar()->useTop())
    {
      return '';
    }

    $limit = (string) $this->limit;

    if ($this->limit instanceof HasBindings)
    {
      $this->mergeBindings($this->limit);
    }

    return "LIMIT $limit";

  }

}