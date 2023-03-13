<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Having as SQLHaving;
use WTFramework\SQL\Predicate;
use WTFramework\SQL\Raw;
use WTFramework\SQL\Interfaces\HasBindings;

trait Having
{

  protected array $having = [];

  public function having(
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

      return $this->arrayHaving(
        conditions: $column,
        not: $not,
        boolean: $boolean
      );

    }

    if ($column instanceof \Closure)
    {
      $column($having = new SQLHaving);
    }

    else
    {

      $having = new Predicate(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: $num_args ?? func_num_args()
      );

    }

    return $this->addHaving(
      having: $having,
      not: $not,
      boolean: $boolean
    );

  }

  public function havingNot(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->having(
      column: $column,
      operator: $operator,
      value: $value,
      not: true,
      num_args: func_num_args()
    );

  }

  public function orHaving(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->having(
      column: $column,
      operator: $operator,
      value: $value,
      boolean: 'or',
      num_args: func_num_args()
    );

  }

  public function orHavingNot(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->having(
      column: $column,
      operator: $operator,
      value: $value,
      not: true,
      boolean: 'or',
      num_args: func_num_args()
    );

  }

  public function havingExists(string|HasBindings $subquery): static
  {

    return $this->having(
      column: '',
      operator: 'exists',
      value: $subquery
    );

  }

  public function havingNotExists(string|HasBindings $subquery): static
  {

    return $this->having(
      column: '',
      operator: 'exists',
      value: $subquery,
      not: true
    );

  }

  public function orHavingExists(string|HasBindings $subquery): static
  {

    return $this->having(
      column: '',
      operator: 'exists',
      value: $subquery,
      boolean: 'or',
    );

  }

  public function orHavingNotExists(string|HasBindings $subquery): static
  {

    return $this->having(
      column: '',
      operator: 'exists',
      value: $subquery,
      not: true,
      boolean: 'or'
    );

  }

  public function havingRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->having(
      column: new Raw(
        string: $string,
        bindings: $bindings
      )
    );

  }

  public function havingNotRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->having(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      not: true,
      num_args: 1
    );

  }

  public function orHavingRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->having(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      boolean: 'or',
      num_args: 1
    );

  }

  public function orHavingNotRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->having(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      not: true,
      boolean: 'or',
      num_args: 1
    );

  }

  protected function arrayHaving(
    array $conditions,
    bool $not,
    string $boolean
  ): static
  {

    foreach ($conditions as $condition)
    {

      if ($condition instanceof \Closure)
      {

        $this->having(
          column: $condition,
          not: $not,
          boolean: $boolean
        );

      }

      else
      {

        $this->having(
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

  protected function addHaving(
    HasBindings $having,
    bool $not,
    string $boolean
  ): static
  {

    $not = $not ? 'NOT ' : '';

    $boolean = empty($this->having) ? '' : strtoupper($boolean) . ' ';

    $this->having[] = [$boolean, $not, $having];

    return $this;

  }

  protected function getHaving(): string
  {

    if (empty($this->having))
    {
      return '';
    }

    foreach ($this->having as [$boolean, $not, $condition])
    {

      $having[] = "$boolean$not$condition";

      if ($condition instanceof HasBindings)
      {
        $this->mergeBindings(from: $condition);
      }

    }

    $having = implode(' ', $having);

    return "HAVING $having";

  }

}