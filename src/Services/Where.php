<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Where as TraitsWhere;

class Where implements HasBindings
{

  use Bind;
  use TraitsWhere;

  public function __construct(
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null
  )
  {

    if ($num_args = func_num_args())
    {

      $this->where(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: $num_args
      );

    }

  }

  public function __toString(): string
  {

    if (empty($this->where))
    {
      return '';
    }

    $this->bindings = [];

    foreach ($this->where as [$boolean, $not, $condition])
    {

      $where[] = "$boolean$not$condition";

      if ($condition instanceof HasBindings)
      {
        $this->mergeBindings($condition);
      }

    }

    $where = implode(' ', $where);

    return 1 == count($this->where) ? $where : "($where)";

  }

}