<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Modify
{

  protected array $modify_column = [];

  public function modify(string|HasBindings|array $column): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->modify_column[] = $column;
    }

    return $this;

  }

  protected function getModify(): string
  {

    if (empty($this->modify_column))
    {
      return '';
    }

    foreach ($this->modify_column as $column)
    {

      $modify_column[] = "MODIFY COLUMN $column";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings($column);
      }

    }

    return implode(', ', $modify_column);

  }

}