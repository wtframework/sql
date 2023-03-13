<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\On;

trait Join
{

  protected array $join = [];

  public function join(
    mixed $table,
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null,
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

      $on = (array) $on;

      $this->join(
        table: $table,
        column: $on[0] ?? null,
        operator: $on[1] ?? null,
        value: $on[2] ?? null,
        join: $join,
        num_args: count($on) + 1
      );

    }

    return $this;

  }

  public function leftJoin(
    mixed $table,
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
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

  public function straightJoin(
    mixed $table,
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
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

  public function rightJoin(
    mixed $table,
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
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

  public function crossJoin(
    mixed $table,
    mixed $column = null,
    mixed $operator = null,
    mixed $value = null
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

  public function naturalJoin(mixed $table): static
  {

    return $this->join(
      table: $table,
      join: 'natural join'
    );

  }

  public function naturalLeftJoin(mixed $table): static
  {

    return $this->join(
      table: $table,
      join: 'natural left join'
    );

  }

  public function naturalRightJoin(mixed $table): static
  {

    return $this->join(
      table: $table,
      join: 'natural right join'
    );

  }

  protected function getOn(
    mixed $column,
    mixed $operator,
    mixed $value,
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
        )
      )
    )
    {
      return $this->getJoinUsing(column: $column);
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
        $this->mergeBindings(from: $table);
      }

      $join_on = implode(' ', $on);

      if (($on[1] ?? null) instanceof HasBindings)
      {
        $this->mergeBindings(from: $on[1]);
      }

      $join[] = "$type $join_table$join_on";

    }

    return implode(' ', $join);

  }

}