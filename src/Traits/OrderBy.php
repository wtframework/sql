<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait OrderBy
{

  protected array $order_by = [];

  public function orderBy(
    string|int|HasBindings|array $column,
    string $direction = 'asc'
  ): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->order_by[] = [$column, strtoupper($direction)];
    }

    return $this;

  }

  public function orderByDesc(string|int|HasBindings|array $column): static
  {

    return $this->orderBy(
      column: $column,
      direction: 'desc'
    );

  }

  protected function getOrderBy(): string
  {

    if (empty($this->order_by))
    {
      return '';
    }

    foreach ($this->order_by as [$column, $direction])
    {

      $order_by[] = "$column $direction";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

    }

    $order_by = implode(', ', $order_by);

    return "ORDER BY $order_by";

  }

}