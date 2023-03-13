<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Predicate;
use WTFramework\SQL\Raw;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Where as SQLWhere;

trait Where
{

  protected array $where = [];

  public function where(
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

      return $this->arrayWhere(
        conditions: $column,
        not: $not,
        boolean: $boolean
      );

    }

    if ($column instanceof \Closure)
    {
      $column($where = new SQLWhere);
    }

    else
    {

      $where = new Predicate(
        column: $column,
        operator: $operator,
        value: $value,
        num_args: $num_args ?? func_num_args()
      );

    }

    return $this->addWhere(
      where: $where,
      not: $not,
      boolean: $boolean
    );

  }

  public function whereNot(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->where(
      column: $column,
      operator: $operator,
      value: $value,
      not: true,
      num_args: func_num_args()
    );

  }

  public function orWhere(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->where(
      column: $column,
      operator: $operator,
      value: $value,
      boolean: 'or',
      num_args: func_num_args()
    );

  }

  public function orWhereNot(
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
  ): static
  {

    return $this->where(
      column: $column,
      operator: $operator,
      value: $value,
      not: true,
      boolean: 'or',
      num_args: func_num_args()
    );

  }

  public function whereExists(string|HasBindings $subquery): static
  {

    return $this->where(
      column: '',
      operator: 'exists',
      value: $subquery
    );

  }

  public function whereNotExists(string|HasBindings $subquery): static
  {

    return $this->where(
      column: '',
      operator: 'exists',
      value: $subquery,
      not: true
    );

  }

  public function orWhereExists(string|HasBindings $subquery): static
  {

    return $this->where(
      column: '',
      operator: 'exists',
      value: $subquery,
      boolean: 'or',
    );

  }

  public function orWhereNotExists(string|HasBindings $subquery): static
  {

    return $this->where(
      column: '',
      operator: 'exists',
      value: $subquery,
      not: true,
      boolean: 'or'
    );

  }

  public function whereRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->where(
      column: new Raw(
        string: $string,
        bindings: $bindings
      )
    );

  }

  public function whereNotRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->where(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      not: true,
      num_args: 1
    );

  }

  public function orWhereRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->where(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      boolean: 'or',
      num_args: 1
    );

  }

  public function orWhereNotRaw(
    string $string,
    mixed $bindings = null
  ): static
  {

    return $this->where(
      column: new Raw(
        string: $string,
        bindings: $bindings
      ),
      not: true,
      boolean: 'or',
      num_args: 1
    );

  }

  protected function arrayWhere(
    array $conditions,
    bool $not,
    string $boolean
  ): static
  {

    foreach ($conditions as $condition)
    {

      if ($condition instanceof \Closure)
      {

        $this->where(
          column: $condition,
          not: $not,
          boolean: $boolean
        );

      }

      else
      {

        $this->where(
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

  protected function addWhere(
    HasBindings $where,
    bool $not,
    string $boolean
  ): static
  {

    $not = $not ? 'NOT ' : '';

    $boolean = empty($this->where) ? '' : strtoupper($boolean) . ' ';

    $this->where[] = [$boolean, $not, $where];

    return $this;

  }

  protected function getWhere(): string
  {

    if (empty($this->where))
    {
      return '';
    }

    foreach ($this->where as [$boolean, $not, $condition])
    {

      $where[] = "$boolean$not$condition";

      if ($condition instanceof HasBindings)
      {
        $this->mergeBindings(from: $condition);
      }

    }

    $where = implode(' ', $where);

    return "WHERE $where";

  }

}