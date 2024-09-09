<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Predicate;

trait Set
{

  protected array $set = [];

  public function set(
    string|array $column,
    string|int|float|HasBindings $value = null
  ): static
  {

    if (is_array($column))
    {

      if (1 === func_num_args())
      {
        return $this->arraySet($column);
      }

      $column = '(' . implode(', ', $column) . ')';

    }

    $this->set[] = [$column, $value];

    return $this;

  }

  protected function arraySet(array $assignments): static
  {

    foreach ($assignments as $column => $value)
    {

      $this->set(
        column: $column,
        value: $value
      );

    }

    return $this;

  }

  protected function getSet(): string
  {

    if (empty($this->set))
    {
      return '';
    }

    foreach ($this->set as [$column, $value])
    {

      $set[] = (string) $predicate = new Predicate(
        column: $column,
        value: $value
      );

      $this->mergeBindings($predicate);

    }

    $set = implode(', ', $set);

    return "SET $set";

  }

}