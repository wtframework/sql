<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait CreateColumn
{

  protected array $column = [];

  public function column(string|HasBindings|array $column): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->column[] = $column;
    }

    return $this;

  }

  protected function getColumn(): string
  {

    if (empty($this->column))
    {
      return '';
    }

    $column = implode(', ', $this->column);

    foreach ($this->column as $c)
    {

      if ($c instanceof HasBindings)
      {
        $this->mergeBindings($c);
      }

    }

    return $column;

  }

}