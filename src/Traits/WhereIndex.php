<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Where;

trait WhereIndex
{

  protected array $where_index = [];

  public function whereIndex(string|HasBindings|Closure|array $condition): static
  {

    $conditions = is_array($condition) ? $condition : [$condition];

    foreach ($conditions as $where)
    {

      if ($where instanceof Closure)
      {
        $where($where = new Where);
      }

      $this->where_index[] = $where;

    }

    return $this;

  }

  protected function getWhereIndex(): string
  {

    if (empty($this->where_index))
    {
      return '';
    }

    $where_index = implode(' AND ', $this->where_index);

    foreach ($this->where_index as $condition)
    {

      if ($condition instanceof HasBindings)
      {
        $this->mergeBindings($condition);
      }

    }

    return "WHERE $where_index";

  }

}