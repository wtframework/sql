<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\SQL;

trait ForValues
{

  protected string $for_values = '';
  protected array $for_values_from = [];
  protected array $for_values_to = [];

  public function forValuesIn(string|int|HasBindings|array $expression): static
  {

    $this->for_values = 'FOR VALUES IN';

    return $this->forValues(
      expression: $expression,
      values: $this->for_values_from
    );

  }

  public function forValuesFrom(string|int|HasBindings|array $expression): static
  {

    $this->for_values = 'FOR VALUES FROM';

    return $this->forValues(
      expression: $expression,
      values: $this->for_values_from
    );

  }

  public function to(string|int|HasBindings|array $expression): static
  {

    $this->for_values = 'FOR VALUES FROM';

    return $this->forValues(
      expression: $expression,
      values: $this->for_values_to
    );

  }

  public function forValuesWith(
    int|HasBindings $modulus,
    int|HasBindings $remainder
  ): static
  {

    $this->for_values = 'FOR VALUES WITH';

    $this->for_values_from = [
      $modulus,
      $remainder
    ];

    return $this;

  }

  protected function forValues(
    string|int|HasBindings|array $expression,
    array &$values
  ): static
  {

    $expressions = is_array($expression) ? $expression : [$expression];

    foreach ($expressions as $expression)
    {

      if (is_string($expression))
      {
        $expression = SQL::bind($expression);
      }

      $values[] = $expression;

    }

    return $this;

  }

  protected function getForValuesFrom(): string
  {

    if (in_array($this->for_values, ['', 'DEFAULT']))
    {
      return '';
    }

    $from = $this->for_values_from;

    if ('FOR VALUES WITH' == $this->for_values)
    {
      $from[0] = "MODULUS $from[0]";
      $from[1] = "REMAINDER $from[1]";
    }

    $from = implode(', ', $from);

    foreach ($this->for_values_from as $expression)
    {

      if ($expression instanceof HasBindings)
      {
        $this->mergeBindings(from: $expression);
      }

    }

    return " ($from)";

  }

  protected function getForValuesTo(): string
  {

    if ('FOR VALUES FROM' != $this->for_values)
    {
      return '';
    }

    $to = implode(', ', $this->for_values_to);

    foreach ($this->for_values_to as $expression)
    {

      if ($expression instanceof HasBindings)
      {
        $this->mergeBindings(from: $expression);
      }

    }

    return " TO ($to)";

  }

  protected function getForValues(): string
  {

    if ('' === $this->for_values)
    {
      return '';
    }

    $from = $this->getForValuesFrom();
    $to = $this->getForValuesTo();

    return "$this->for_values$from$to";

  }

}