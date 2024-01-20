<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait CreateIndex
{

  protected array $index = [];

  public function index(string|HasBindings|array $index): static
  {

    if ($index instanceof HasBindings)
    {
      $this->index[] = $index;
    }

    else
    {

      $indexes = is_array(current((array) $index)) ? $index : [$index];

      foreach ($indexes as $index)
      {
        $this->index[] = "INDEX (" . implode(', ', (array) $index) . ")";
      }

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