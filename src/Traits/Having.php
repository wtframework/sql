<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Predicate;
use WTFramework\SQL\Services\Subquery;
use WTFramework\SQL\Services\Having as ServicesHaving;

trait Having
{

  protected array $having = [];

  public function having(
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

      return $this->arrayHaving(
        conditions: $column,
        or: $or,
        not: $not
      );

    }

    if ($column instanceof Closure)
    {
      $column($having = new ServicesHaving);
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
      or: $or,
      not: $not
    );

  }

  protected function arrayHaving(
    array $conditions,
    bool $or,
    bool $not
  ): static
  {

    foreach ($conditions as $key => $condition)
    {

      if (is_string($key))
      {

        $this->having(
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

        $this->having(
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

        $this->having(
          column: $condition,
          or: $or,
          not: $not,
          num_args: 1
        );

      }

    }

    return $this;

  }

  public function orHaving(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
  ): static
  {

    return $this->having(
      column: $column,
      operator: $operator,
      value: $value,
      or: true,
      num_args: func_num_args()
    );

  }

  public function havingNot(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
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

  public function orHavingNot(
    string|int|float|HasBindings|Closure|array $column = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value = null
  ): static
  {

    return $this->having(
      column: $column,
      operator: $operator,
      value: $value,
      or: true,
      not: true,
      num_args: func_num_args()
    );

  }

  public function havingExists(
    string|HasBindings $subquery,
    bool $or = false,
    bool $not = false
  ): static
  {

    if (!($subquery instanceof Subquery))
    {
      $subquery = new Subquery($subquery);
    }

    return $this->having(
      column: $subquery->exists(),
      or: $or,
      not: $not,
      num_args: 1
    );

  }

  public function orHavingExists(string|HasBindings $subquery): static
  {

    return $this->havingExists(
      subquery: $subquery,
      or: true
    );

  }

  public function havingNotExists(string|HasBindings $subquery): static
  {

    return $this->havingExists(
      subquery: $subquery,
      not: true
    );

  }

  public function orHavingNotExists(string|HasBindings $subquery): static
  {

    return $this->havingExists(
      subquery: $subquery,
      or: true,
      not: true
    );

  }

  protected function addHaving(
    HasBindings $having,
    bool $or,
    bool $not
  ): static
  {

    $boolean = empty($this->having) ? '' : ($or ? 'OR ' : 'AND ');

    $not = $not ? 'NOT ' : '';

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
        $this->mergeBindings($condition);
      }

    }

    $having = implode(' ', $having);

    return "HAVING $having";

  }

}