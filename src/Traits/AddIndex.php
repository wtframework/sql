<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Index;
use WTFramework\SQL\Interfaces\HasBindings;

trait AddIndex
{

  protected array $add_index = [];

  public function addIndex(
    string|HasBindings|\Closure|array $index,
    string $name = null
  ): static
  {

    if ($index instanceof \Closure)
    {
      $index($index = new Index(name: $name));
    }

    elseif (!($index instanceof HasBindings))
    {
      $index = (new Index(name: $name))->column(column: $index);
    }

    $this->add_index[] = $index;

    return $this;

  }

  public function addIndexes(array $indexes): static
  {

    foreach ($indexes as $name => $index)
    {

      $this->addIndex(
        index: $index,
        name: is_string($name) ? $name : null
      );

    }

    return $this;

  }

  protected function getAddIndex(): string
  {

    if (empty($this->add_index))
    {
      return '';
    }

    foreach ($this->add_index as $index)
    {

      $add_index[] = "ADD $index";

      if ($index instanceof HasBindings)
      {
        $this->mergeBindings(from: $index);
      }

    }

    return implode(', ', $add_index);

  }

}