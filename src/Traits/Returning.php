<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Returning
{

  protected array $returning = [];

  public function returning(string|int|HasBindings|array $column = '*'): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->returning[] = $column;
    }

    return $this;

  }

  protected function getReturning(): string
  {

    if (empty($this->returning))
    {
      return '';
    }

    $returning = implode(', ', $this->returning);

    foreach ($this->returning as $column)
    {

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

    }

    return "RETURNING $returning";

  }

}