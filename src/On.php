<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\On as TraitsOn;

class On implements HasBindings
{

  use Bind;
  use TraitsOn;

  public function __construct(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null,
  )
  {

    if (null !== $column)
    {

      $this->on(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: func_num_args()
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
        $this->mergeBindings(from: $condition);
      }

    }

    $on = implode(' ', $on);

    return 1 == count($this->on) ? $on : "($on)";

  }

}