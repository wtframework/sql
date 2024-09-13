<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\SQL;

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

    if (is_string($value))
    {
      $value = SQL::bind($value);
    }

    $this->set[] = [$column, $value ?? "NULL"];

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

      $set[] = "$column = $value";

      if ($value instanceof HasBindings)
      {
        $this->mergeBindings($value);
      }

    }

    $set = implode(', ', $set);

    return "SET $set";

  }

}