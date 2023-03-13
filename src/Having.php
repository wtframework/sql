<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Having as TraitsHaving;

class Having implements HasBindings
{

  use Bind;
  use TraitsHaving;

  public function __construct(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null,
  )
  {

    if (null !== $column)
    {

      $this->having(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: func_num_args()
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
        $this->mergeBindings(from: $condition);
      }

    }

    $having = implode(' ', $having);

    return 1 == count($this->having) ? $having : "($having)";

  }

}