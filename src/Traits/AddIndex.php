<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait AddIndex
{

  protected array $add_index = [];

  public function addIndex(string|HasBindings|array $index): static
  {

    $indexes = is_array($index) ? $index : [$index];

    foreach ($indexes as $index)
    {
      $this->add_index[] = $index;
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
        $this->mergeBindings($index);
      }

    }

    return implode(', ', $add_index);

  }

}