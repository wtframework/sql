<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Predicate;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\Services\Where as ServicesWhere;
use WTFramework\SQL\SQL;

trait Where
{

  protected array $where = [];

  public function where(
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

      return $this->arrayWhere(
        conditions: $column,
        or: $or,
        not: $not
      );

    }

    if ($column instanceof Closure)
    {
      $column($where = new ServicesWhere);
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
      or: $or,
      not: $not
    );

  }

  protected function arrayWhere(
    array $conditions,
    bool $or,
    bool $not
  ): static
  {

    foreach ($conditions as $key => $condition)
    {

      if (is_string($key))
      {

        $this->where(
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

        $this->where(
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

        $this->where(
          column: $condition,
          or: $or,
          not: $not,
          num_args: 1
        );

      }

    }

    return $this;

  }

  public function orWhere(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
  ): static
  {

    return $this->where(
      column: $column,
      operator: $operator,
      value: $value,
      or: true,
      num_args: func_num_args()
    );

  }

  public function whereNot(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
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

  public function orWhereNot(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
  ): static
  {

    return $this->where(
      column: $column,
      operator: $operator,
      value: $value,
      or: true,
      not: true,
      num_args: func_num_args()
    );

  }

  public function whereExists(
    string|HasBindings $subquery,
    bool $or = false,
    bool $not = false
  ): static
  {

    if (!($subquery instanceof Subquery))
    {
      $subquery = new Subquery($subquery);
    }

    return $this->where(
      column: $subquery->exists(),
      or: $or,
      not: $not,
      num_args: 1
    );

  }

  public function orWhereExists(string|HasBindings $subquery): static
  {

    return $this->whereExists(
      subquery: $subquery,
      or: true
    );

  }

  public function whereNotExists(string|HasBindings $subquery): static
  {

    return $this->whereExists(
      subquery: $subquery,
      not: true
    );

  }

  public function orWhereNotExists(string|HasBindings $subquery): static
  {

    return $this->whereExists(
      subquery: $subquery,
      or: true,
      not: true
    );

  }

  public function whereRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->where(SQL::raw($condition, $bindings));
  }

  public function orWhereRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->orWhere(SQL::raw($condition, $bindings));
  }

  public function whereNotRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->whereNot(SQL::raw($condition, $bindings));
  }

  public function orWhereNotRaw(
    string $condition,
    string|int|float|array $bindings = []
  ): static
  {
    return $this->orWhereNot(SQL::raw($condition, $bindings));
  }

  protected function addWhere(
    HasBindings $where,
    bool $or,
    bool $not
  ): static
  {

    $boolean = empty($this->where) ? '' : ($or ? 'OR ' : 'AND ');

    $not = $not ? 'NOT ' : '';

    $this->where[] = [$boolean, $not, $where];

    return $this;

  }

  protected function getWhere(bool $parentheses = false): string
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
        $this->mergeBindings($condition);
      }

    }

    $where = implode(' ', $where);

    $where = $parentheses ? "($where)" : $where;

    return "WHERE $where";

  }

}