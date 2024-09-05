<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait CreateIndex
{

  protected array $index = [];

  public function index(string|HasBindings|array $index, string $name = null): static
  {

    if ($index instanceof HasBindings)
    {
      $this->index[] = $index;
    }

    else
    {

      $name = $name ? "$name " : "";

      $this->index[] = "INDEX $name(" . implode(', ', (array) $index) . ")";

    }

    return $this;

  }

  protected function getIndex(): string
  {

    if (empty($this->index))
    {
      return '';
    }

    $index = implode(', ', $this->index);

    foreach ($this->index as $c)
    {

      if ($c instanceof HasBindings)
      {
        $this->mergeBindings($c);
      }

    }

    return $index;

  }

}