<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Index
{

  protected array $index = [];

  public function index(string|array $index): static
  {

    foreach ((array) $index as $i)
    {
      $this->index[] = $i;
    }

    return $this;

  }

  protected function getIndex(): string
  {
    return implode(', ', $this->index);
  }

}