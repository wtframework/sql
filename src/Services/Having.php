<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Having as TraitsHaving;

class Having implements HasBindings
{

  use Bind;
  use TraitsHaving;

  public function __construct(
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null
  )
  {

    if ($num_args = func_num_args())
    {

      $this->having(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: $num_args
      );

    }

  }

  public function __toString(): string
  {

    if (empty($this->having))
    {
      return '';
    }

    $this->bindings = [];

    foreach ($this->having as [$boolean, $not, $condition])
    {

      $having[] = "$boolean$not$condition";

      if ($condition instanceof HasBindings)
      {
        $this->mergeBindings($condition);
      }

    }

    $having = implode(' ', $having);

    return 1 == count($this->having) ? $having : "($having)";

  }

}