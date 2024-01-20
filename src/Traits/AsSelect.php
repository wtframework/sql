<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait AsSelect
{

  protected string|HasBindings $as = '';

  public function as(string|HasBindings $stmt): static
  {

    $this->as = $stmt;

    return $this;

  }

  protected function getAs(): string
  {

    if ('' === $this->as)
    {
      return '';
    }

    $as = (string) $this->as;

    if ($this->as instanceof HasBindings)
    {
      $this->mergeBindings($this->as);
    }

    return "AS $as";

  }

}