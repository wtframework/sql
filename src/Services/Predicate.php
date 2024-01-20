<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Statements\Select;
use WTFramework\SQL\Traits\Bind;

class Predicate implements HasBindings
{

  use Bind;

  protected array $predicate = [];

  public function __construct(
    string|int|HasBindings $column,
    string|int|array|HasBindings $operator = null,
    string|int|array|HasBindings $value = null,
    int $num_args = null
  )
  {

    $this->predicate[] = $column;

    if (1 != $num_args ??= func_num_args())
    {

      [$this->predicate[1], $this->predicate[2]] = [
        strtoupper(
          2 == $num_args
          ? $this->operator($operator)
          : $operator ?? $this->operator($value)
        ),
        2 == $num_args ? $operator : $value,
      ];

    }

  }

  protected function operator(string|int|array|HasBindings|null $value): string
  {

    return match (true)
    {
      null === $value => 'IS',
      is_array($value) => 'IN',
      default => '=',
    };

  }

  protected function array(
    array $array,
    string $operator
  ): string
  {

    foreach ($array as $item)
    {
      $expression[] = $this->unit($item, $operator, bind: true);
    }

    if ('BETWEEN' === strtoupper(trim($operator)))
    {
      return implode(' AND ', $expression ?? []);
    }

    $expression = implode(', ', $expression ?? []);

    return  "($expression)";

  }

  protected function unit(
    string|int|array|HasBindings|null $unit,
    string $operator = null,
    bool $bind
  ): string|int
  {

    switch (true)
    {

      case null === $unit:
        return 'NULL';

      case is_array($unit):
        return $this->array($unit, (string) $operator);

      case $unit instanceof HasBindings:
        $expression = (string) $unit;
        $this->mergeBindings($unit);
        return $expression;

      case $bind && is_string($unit):
        $this->bind($unit);
        return '?';

      default:
        return $unit;

    }

  }

  public static function convertSelectToSubquery(mixed $expression): mixed
  {

    if ($expression instanceof Select)
    {
      $expression = new Subquery($expression);
    }

    return $expression;

  }

  public function __toString(): string
  {

    $this->bindings = [];

    foreach ($this->predicate as $i => $unit)
    {

      $predicate[] = 1 == $i ? $unit : $this->unit(
        unit: $unit,
        operator: $this->predicate[1] ?? null,
        bind: 2 == $i
      );

    }

    return implode(' ', $predicate ?? []);

  }

}