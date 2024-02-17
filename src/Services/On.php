<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Macroable;
use WTFramework\SQL\Traits\On as TraitsOn;

class On implements HasBindings
{

  use Bind;
  use Macroable;
  use TraitsOn;

  public function __construct(
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null
  )
  {

    if ($num_args = func_num_args())
    {

      $this->on(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: $num_args
      );

    }

  }

  public function __toString(): string
  {

    if (empty($this->on))
    {
      return '';
    }

    $this->bindings = [];

    foreach ($this->on as [$boolean, $not, $condition])
    {

      $on[] = "$boolean$not$condition";

      if ($condition instanceof HasBindings)
      {
        $this->mergeBindings($condition);
      }

    }

    $on = implode(' ', $on);

    return 1 == count($this->on) ? $on : "($on)";

  }

}