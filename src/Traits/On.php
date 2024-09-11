<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\On as ServicesOn;
use WTFramework\SQL\Services\Predicate;
use WTFramework\SQL\Services\Raw;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\SQL;

trait On
{

  protected array $on = [];

  public function on(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null,
    bool $or = false,
    bool $not = false,
    int $num_args = null
  ): static
  {

    if (is_array($column))
    {

      return $this->arrayOn(
        conditions: $column,
        or: $or,
        not: $not
      );

    }

    if ($column instanceof Closure)
    {
      $column($on = new ServicesOn);
    }

    else
    {

      $num_args ??= func_num_args();

      $on = new Predicate(
        column: $column,
        operator: is_string($operator) && 2 == $num_args
          ? new Raw($operator)
          : $operator,
        value: is_string($value)
          ? new Raw($value)
          : $value,
        num_args: $num_args
      );

    }

    return $this->addOn(
      on: $on,
      or: $or,
      not: $not
    );

  }

  protected function arrayOn(
    array $conditions,
    bool $or,
    bool $not
  ): static
  {

    foreach ($conditions as $key => $condition)
    {

      if (is_string($key))
      {

        $this->on(
          column: $key,
          value: $condition,
          or: $or,
          not: $not,
          num_args: 3
        );

      }

      elseif (is_array($condition))
      {

        $num_args = count($condition);

        $this->on(
          column: array_shift($condition),
          operator: array_shift($condition),
          value: array_shift($condition),
          or: $or,
          not: $not,
          num_args: $num_args
        );

      }

      else
      {

        $this->on(
          column: $condition,
          or: $or,
          not: $not,
          num_args: 1
        );

      }

    }

    return $this;

  }

  public function orOn(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
  ): static
  {

    return $this->on(
      column: $column,
      operator: $operator,
      or: true,
      value: $value,
      num_args: func_num_args()
    );

  }

  public function onNot(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
  ): static
  {

    return $this->on(
      column: $column,
      operator: $operator,
      value: $value,
      not: true,
      num_args: func_num_args()
    );

  }

  public function orOnNot(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
  ): static
  {

    return $this->on(
      column: $column,
      operator: $operator,
      value: $value,
      or: true,
      not: true,
      num_args: func_num_args()
    );

  }

  public function onExists(
    string|HasBindings $subquery,
    bool $or = false,
    bool $not = false
  ): static
  {

    if (!($subquery instanceof Subquery))
    {
      $subquery = new Subquery($subquery);
    }

    return $this->on(
      column: $subquery->exists(),
      or: $or,
      not: $not,
      num_args: 1
    );

  }

  public function orOnExists(string|HasBindings $subquery): static
  {

    return $this->onExists(
      subquery: $subquery,
      or: true
    );

  }

  public function onNotExists(string|HasBindings $subquery): static
  {

    return $this->onExists(
      subquery: $subquery,
      not: true
    );

  }

  public function orOnNotExists(string|HasBindings $subquery): static
  {

    return $this->onExists(
      subquery: $subquery,
      or: true,
      not: true
    );

  }

  public function onRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->on(SQL::raw($condition, $bindings));
  }

  public function orOnRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->orOn(SQL::raw($condition, $bindings));
  }

  public function onNotRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->onNot(SQL::raw($condition, $bindings));
  }

  public function orOnNotRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->orOnNot(SQL::raw($condition, $bindings));
  }

  protected function addOn(
    HasBindings $on,
    bool $or,
    bool $not
  ): static
  {

    $boolean = empty($this->on) ? '' : ($or ? 'OR ' : 'AND ');

    $not = $not ? 'NOT ' : '';

    $this->on[] = [$boolean, $not, $on];

    return $this;

  }

}