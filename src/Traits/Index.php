<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Index as SQLIndex;
use WTFramework\SQL\Interfaces\HasBindings;

trait Index
{

  protected array $index = [];

  public function index(
    string|HasBindings|\Closure|array $index,
    string $name = null
  ): static
  {

    if ($index instanceof \Closure)
    {
      $index($index = new SQLIndex(name: $name));
    }

    elseif (!($index instanceof HasBindings))
    {
      $index = (new SQLIndex(name: $name))->column(column: $index);
    }

    $this->index[] = $index;

    return $this;

  }

  public function indexes(array $indexes): static
  {

    foreach ($indexes as $name => $index)
    {

      $this->index(
        index: $index,
        name: is_string($name) ? $name : null
      );

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

    foreach ($this->index as $i)
    {

      if ($i instanceof HasBindings)
      {
        $this->mergeBindings(from: $i);
      }

    }

    return $index;

  }

}