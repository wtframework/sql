<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait ForValues
{

  protected array $for_value = [];

  public function forValuesDefault(): static
  {

    $this->for_value = ['DEFAULT'];

    return $this;

  }

  public function forValuesIn(string|float|HasBindings|array $expression): static
  {

    $expression = is_array($expression) ? $expression : [$expression];

    $this->for_value = ['IN', $expression];

    return $this;

  }

  public function forValues(
    string|float|HasBindings|array $from,
    string|float|HasBindings|array $to
  ): static
  {

    $from = is_array($from) ? $from : [$from];
    $to = is_array($to) ? $to : [$to];

    $this->for_value = ['FROM', $from, 'TO', $to];

    return $this;

  }

  public function forValuesWith(
    int $modulus,
    int $remainder
  ): static
  {

    $this->for_value = ['WITH', ["MODULUS $modulus", "REMAINDER $remainder"]];

    return $this;

  }

  protected function getForValues(): string
  {

    if (empty($this->for_value))
    {
      return '';
    }

    foreach ($this->for_value as $k => $part)
    {

      if (is_array($part))
      {

        $part = '(' . implode(', ', $part) . ')';

        foreach ($this->for_value[$k] as $value)
        {

          if ($value instanceof HasBindings)
          {
            $this->mergeBindings($value);
          }

        }

      }

      $for_value[] = $part;

    }

    $for_value = implode(' ', $for_value);

    return "FOR VALUES $for_value";

  }

}