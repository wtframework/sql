<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Returning
{

  protected array $returning = [];

  public function returning(string|int|float|HasBindings|array $column = '*'): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $alias => $column)
    {
      $this->returning[] = [$column, is_string($alias) ? " AS $alias" : ''];
    }

    return $this;

  }

  protected function getReturning(): string
  {

    if (empty($this->returning))
    {
      return '';
    }

    foreach ($this->returning as [$column, $alias])
    {

      $returning[] = "$column$alias";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings($column);
      }

    }

    $returning = implode(', ', $returning);

    return "RETURNING $returning";

  }

}