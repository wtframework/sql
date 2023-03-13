<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Where as TraitsWhere;

class Where implements HasBindings
{

  use Bind;
  use TraitsWhere;

  public function __construct(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null,
  )
  {

    if (null !== $column)
    {

      $this->where(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: func_num_args()
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
        $this->mergeBindings(from: $condition);
      }

    }

    $where = implode(' ', $where);

    return 1 == count($this->where) ? $where : "($where)";

  }

}