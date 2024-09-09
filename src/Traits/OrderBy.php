<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait OrderBy
{

  protected array $order_by = [];

  public function orderBy(
    string|int|float|HasBindings|array $column,
    string $direction = ''
  ): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->order_by[] = [$column, strtoupper($direction)];
    }

    return $this;

  }

  public function orderByDesc(string|HasBindings|array $column): static
  {

    return $this->orderBy(
      column: $column,
      direction: 'desc'
    );

  }

  public function orderByUsing(
    string|HasBindings|array $column,
    string $operator
  ): static
  {

    return $this->orderBy(
      column: $column,
      direction: "using $operator"
    );

  }

  public function orderByNullsFirst(string|HasBindings|array $column): static
  {

    return $this->orderBy(
      column: $column,
      direction: 'nulls first'
    );

  }

  public function orderByNullsLast(string|HasBindings|array $column): static
  {

    return $this->orderBy(
      column: $column,
      direction: 'nulls last'
    );

  }

  public function orderByDescNullsFirst(string|HasBindings|array $column): static
  {

    return $this->orderBy(
      column: $column,
      direction: 'desc nulls first'
    );

  }

  public function orderByDescNullsLast(string|HasBindings|array $column): static
  {

    return $this->orderBy(
      column: $column,
      direction: 'desc nulls last'
    );

  }

  public function orderByUsingNullsFirst(
    string|HasBindings|array $column,
    string $operator
  ): static
  {

    return $this->orderBy(
      column: $column,
      direction: "using $operator nulls first"
    );

  }

  public function orderByUsingNullsLast(
    string|HasBindings|array $column,
    string $operator
  ): static
  {

    return $this->orderBy(
      column: $column,
      direction: "using $operator nulls last"
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

      $order_by[] = trim("$column $direction");

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings($column);
      }

    }

    $order_by = implode(', ', $order_by);

    return "ORDER BY $order_by";

  }

}