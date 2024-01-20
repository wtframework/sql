<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Offset
{

  protected int|string|HasBindings $offset = '';

  public function offset(int|HasBindings $offset): static
  {

    $this->offset = $offset;

    return $this;

  }

  protected function getOffset(): string
  {

    if ('' === $this->offset)
    {
      return '';
    }

    $offset = (string) $this->offset;

    if ($this->offset instanceof HasBindings)
    {
      $this->mergeBindings($this->offset);
    }

    return "OFFSET $offset";

  }

}