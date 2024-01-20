<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait AddColumn
{

  protected array $add_column = [];

  public function addColumn(string|HasBindings|array $column): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->add_column[] = $column;
    }

    return $this;

  }

  protected function getAddColumn(): string
  {

    if (empty($this->add_column))
    {
      return '';
    }

    foreach ($this->add_column as $column)
    {

      $add_column[] = "ADD $column";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings($column);
      }

    }

    return implode(', ', $add_column);

  }

}