<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait GroupBy
{

  protected array $group_by = [];
  protected string $with_rollup = '';

  public function groupBy(string|int|HasBindings|array $column): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->group_by[] = $column;
    }

    return $this;

  }

  public function groupByWithRollup(mixed $column): static
  {

    $this->with_rollup = ' WITH ROLLUP';

    return $this->groupBy(column: $column);

  }

  protected function getGroupBy(): string
  {

    if (empty($this->group_by))
    {
      return '';
    }

    $group_by = implode(', ', $this->group_by);

    foreach ($this->group_by as $column)
    {

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

    }

    return "GROUP BY $group_by$this->with_rollup";

  }

}