<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;

class Predicate implements HasBindings
{

  use Bind;

  protected array $predicate = [];

  public function __construct(
    mixed $column,
    mixed $operator = null,
    mixed $value = null,
    int $num_args = null
  )
  {

    $this->predicate[] = $column;

    if (1 != $num_args ??= func_num_args())
    {

      [$this->predicate[1], $this->predicate[2]] = [
        strtoupper(
          2 == $num_args
          ? $this->operator(value: $operator)
          : $operator ?? $this->operator(value: $value)
        ),
        2 == $num_args ? $operator : $value,
      ];

    }

  }

  protected function operator(mixed $value): string
  {

    return match (true)
    {
      null === $value => 'IS',
      is_array($value) => 'IN',
      default => '=',
    };

  }

  protected function value(array $expression): string
  {

    switch ($this->predicate[1] ?? 'IN')
    {

      case 'BETWEEN':
        return implode(' AND ', $expression);

      default:
        $expression = implode(', ', $expression);
        return  "($expression)";

    }

  }

  protected function unit(
    mixed $unit,
    bool $bind
  ): string
  {

    switch (true)
    {

      case null === $unit:
        return 'NULL';

      case $unit instanceof HasBindings:

        if (
          ('EXISTS' == ($this->predicate[1] ?? ''))
          &&
          !($unit instanceof Subquery)
        )
        {
          $unit = new Subquery(stmt: $unit);
        }

        $expression = (string) $unit;

        $this->mergeBindings(from: $unit);

        return $expression;

      case is_array($unit):

        foreach ($unit as $item)
        {

          $expression[] = $this->unit(
            unit: $item,
            bind: $bind
          );

        }

        return $this->value($expression ?? []);

      case $bind:
        $this->bind(values: $unit);
        return '?';

      default:
        return $unit;

    }

  }

  public function __toString(): string
  {

    $this->bindings = [];

    foreach ($this->predicate as $i => $unit)
    {

      if ('' === $unit)
      {
        continue;
      }

      $predicate[] = 1 == $i ? $unit : $this->unit(
        unit: $unit,
        bind: 2 == $i
      );

    }

    return implode(' ', $predicate);

  }

}