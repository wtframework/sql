<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait GroupBy
{

  protected array $group_by = [];
  protected string $with_rollup = '';

  public function groupBy(
    string|int|HasBindings|array $column,
    bool $desc = false
  ): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->group_by[] = [$column, $desc ? ' DESC' : ''];
    }

    return $this;

  }

  public function groupByDesc(string|HasBindings|array $column): static
  {

    return $this->groupBy(
      column: $column,
      desc: true
    );

  }

  public function withRollup(): static
  {

    $this->with_rollup = ' WITH ROLLUP';

    return $this;

  }

  protected function getGroupBy(): string
  {

    if (empty($this->group_by))
    {
      return '';
    }

    foreach ($this->group_by as [$column, $direction])
    {

      $group_by[] = "$column$direction";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings($column);
      }

    }

    $group_by = implode(', ', $group_by);

    return "GROUP BY $group_by$this->with_rollup";

  }

}