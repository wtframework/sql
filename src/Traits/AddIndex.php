<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait AddIndex
{

  protected array $add_index = [];

  public function addIndex(string|HasBindings|array $index, string $name = null): static
  {

    if ($index instanceof HasBindings)
    {
      $this->add_index[] = $index;
    }

    else
    {

      $name = $name ? "$name " : "";

      $this->add_index[] = "INDEX $name(" . implode(', ', (array) $index) . ")";

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