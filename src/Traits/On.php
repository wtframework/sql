<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\On as SQLOn;
use WTFramework\SQL\Predicate;
use WTFramework\SQL\Raw;
use WTFramework\SQL\SQL;

trait On
{

  protected array $on = [];

  public function on(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null,
    bool $not = false,
    string $boolean = 'and',
    int $num_args = null
  ): static
  {

    if (is_array($column))
    {

      return $this->arrayOn(
        conditions: $column,
        not: $not,
        boolean: $boolean
      );

    }

    if ($column instanceof \Closure)
    {
      $column($on = new SQLOn);
    }

    else
    {

      $num_args ??= func_num_args();

      $on = new Predicate(
        column: $column,
        operator: 2 == $num_args ? $this->makeRaw(value: $operator) : $operator,
        value: $this->makeRaw(value: $value),
        num_args: $num_args
      );

    }

    return $this->addOn(
      on: $on,
      not: $not,
      boolean: $boolean
    );

  }

  protected function makeRaw(mixed $value): mixed
  {

    if (is_string($value))
    {
      return SQL::raw($value);
    }

    if (is_array($value))
    {

      foreach ($value as &$v)
      {

        if (is_string($v))
        {
          $v = SQL::raw($v);
        }

      }

    }

    return $value;

  }

  public function onNot(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
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

  public function orOn(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->on(
      column: $column,
      operator: $operator,
      value: $value,
      boolean: 'or',
      num_args: func_num_args()
    );

  }

  public function orOnNot(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->on(
      column: $column,
      operator: $operator,
      value: $value,
      not: true,
      boolean: 'or',
      num_args: func_num_args()
    );

  }

  public function onExists(string|HasBindings $subquery): static
  {

    return $this->on(
      column: '',
      operator: 'exists',
      value: $subquery
    );

  }

  public function onNotExists(string|HasBindings $subquery): static
  {

    return $this->on(
      column: '',
      operator: 'exists',
      value: $subquery,
      not: true
    );

  }

  public function orOnExists(string|HasBindings $subquery): static
  {

    return $this->on(
      column: '',
      operator: 'exists',
      value: $subquery,
      boolean: 'or',
    );

  }

  public function orOnNotExists(string|HasBindings $subquery): static
  {

    return $this->on(
      column: '',
      operator: 'exists',
      value: $subquery,
      not: true,
      boolean: 'or'
    );

  }

  public function onRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->on(
      column: new Raw(
        string: $string,
        bindings: $bindings
      )
    );

  }

  public function onNotRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->on(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      not: true,
      num_args: 1
    );

  }

  public function orOnRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->on(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      boolean: 'or',
      num_args: 1
    );

  }

  public function orOnNotRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->on(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      not: true,
      boolean: 'or',
      num_args: 1
    );

  }

  protected function arrayOn(
    array $conditions,
    bool $not,
    string $boolean
  ): static
  {

    foreach ($conditions as $condition)
    {

      if ($condition instanceof \Closure)
      {

        $this->on(
          column: $condition,
          not: $not,
          boolean: $boolean
        );

      }

      else
      {

        $this->on(
          column: $condition[0] ?? null,
          operator: $condition[1] ?? null,
          value: $condition[2] ?? null,
          not: $not,
          boolean: $boolean,
          num_args: count($condition)
        );

      }

    }

    return $this;

  }

  protected function addOn(
    HasBindings $on,
    bool $not,
    string $boolean
  ): static
  {

    $not = $not ? 'NOT ' : '';

    $boolean = empty($this->on) ? '' : strtoupper($boolean) . ' ';

    $this->on[] = [$boolean, $not, $on];

    return $this;

  }

}