<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Predicate;

trait Set
{

  protected array $set = [];

  public function set(
    string|array $column,
    string|int|HasBindings $value = null
  ): static
  {

    if (is_array($column))
    {
      return $this->arraySet(assignments: $column);
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

      $predicate = new Predicate(
        column: $column,
        value: $value
      );

      $set[] = (string) $predicate;

      $this->mergeBindings(from: $predicate);

    }

    $set = implode(', ', $set);

    return "SET $set";

  }

}