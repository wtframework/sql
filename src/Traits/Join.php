<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\On;

trait Join
{

  protected array $join = [];

  public function join(
    string|HasBindings|array $table,
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
    string $join = 'join',
    int $num_args = null
  ): static
  {

    if (is_array($table))
    {

      return $this->arrayJoin(
        tables: $table,
        join: $join
      );

    }

    $on = $this->getOn(
      column: $column,
      operator: $operator,
      value: $value,
      num_args: ($num_args ?? func_num_args()) - 1
    );

    $this->join[] = [strtoupper($join), $table, $on];

    return $this;

  }

  protected function arrayJoin(
    array $tables,
    string $join
  ): static
  {

    foreach ($tables as $table => $on)
    {

      if ($on instanceof Closure)
      {

        $this->join(
          table: $table,
          column: $on,
          join: $join,
          num_args: 2
        );

      }

      elseif (is_int($table))
      {

        $this->join(
          table: $on,
          join: $join,
          num_args: 1
        );

      }

      else
      {

        $on = (array) $on;

        $num_args = count($on) + 1;

        $this->join(
          table: $table,
          column: array_shift($on),
          operator: array_shift($on),
          value: array_shift($on),
          join: $join,
          num_args: $num_args
        );

      }

    }

    return $this;

  }

  public function leftJoin(
    string|HasBindings|array $table,
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
  ): static
  {

    return $this->join(
      table: $table,
      column: $column,
      operator: $operator,
      value: $value,
      join: 'left join',
      num_args: func_num_args()
    );

  }

  public function rightJoin(
    string|HasBindings|array $table,
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
  ): static
  {

    return $this->join(
      table: $table,
      column: $column,
      operator: $operator,
      value: $value,
      join: 'right join',
      num_args: func_num_args()
    );

  }

  public function fullJoin(
    string|HasBindings|array $table,
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
  ): static
  {

    return $this->join(
      table: $table,
      column: $column,
      operator: $operator,
      value: $value,
      join: 'full join',
      num_args: func_num_args()
    );

  }

  public function crossJoin(
    string|HasBindings|array $table,
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
  ): static
  {

    return $this->join(
      table: $table,
      column: $column,
      operator: $operator,
      value: $value,
      join: 'cross join',
      num_args: func_num_args()
    );

  }

  public function straightJoin(
    string|HasBindings|array $table,
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
  ): static
  {

    return $this->join(
      table: $table,
      column: $column,
      operator: $operator,
      value: $value,
      join: 'straight_join',
      num_args: func_num_args()
    );

  }

  public function naturalJoin(string|HasBindings|array $table): static
  {

    return $this->join(
      table: $table,
      join: 'natural join'
    );

  }

  public function naturalLeftJoin(string|HasBindings|array $table): static
  {

    return $this->join(
      table: $table,
      join: 'natural left join'
    );

  }

  public function naturalRightJoin(string|HasBindings|array $table): static
  {

    return $this->join(
      table: $table,
      join: 'natural right join'
    );

  }

  public function naturalFullJoin(string|HasBindings|array $table): static
  {

    return $this->join(
      table: $table,
      join: 'natural full join'
    );

  }

  protected function getOn(
    string|int|HasBindings|Closure|array $column = null,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
    int $num_args
  ): array
  {

    if (null === $column)
    {
      return [];
    }

    if (
      1 == $num_args
      &&
      (
        is_string($column)
        ||
        (
          is_array($column)
          &&
          is_string(current($column))
          &&
          !is_string(key($column))
        )
      )
    )
    {
      return $this->getJoinUsing($column);
    }

    $on = (new On)->on(
      column: $column,
      operator: $operator,
      value: $value,
      num_args: $num_args
    );

    return [' ON', $on];

  }

  protected function getJoinUsing(string|array $column): array
  {

    $column = implode(', ', (array) $column);

    return [' USING', "($column)"];

  }

  protected function getJoin(): string
  {

    if (empty($this->join))
    {
      return '';
    }

    foreach ($this->join as [$type, $table, $on])
    {

      $join_table = (string) $table;

      if ($table instanceof HasBindings)
      {
        $this->mergeBindings($table);
      }

      $join_on = implode(' ', $on);

      if (($on[1] ?? null) instanceof HasBindings)
      {
        $this->mergeBindings($on[1]);
      }

      $join[] = "$type $join_table$join_on";

    }

    return implode(' ', $join);

  }

}