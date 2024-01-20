<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait PartitionValues
{

  protected array $partition_value = [];

  public function valuesLessThan(string|float|HasBindings|array $expression): static
  {

    $expression = is_array($expression) ? $expression : [$expression];

    $this->partition_value = ['LESS THAN', $expression];

    return $this;

  }

  public function valuesLessThanMaxValue(): static
  {

    $this->partition_value = ['LESS THAN MAXVALUE'];

    return $this;

  }

  public function valuesIn(array $values): static
  {

    $this->partition_value = ['IN', $values];

    return $this;

  }

  protected function getPartitionValues(): string
  {

    if (empty($this->partition_value))
    {
      return '';
    }

    if (isset($this->partition_value[1]))
    {

      $values = implode(', ', $this->partition_value[1]);

      foreach ($this->partition_value[1] as $value)
      {

        if ($value instanceof HasBindings)
        {
          $this->mergeBindings($value);
        }

      }

      $this->partition_value[1] = "($values)";

    }

    $partition_value = implode(' ', $this->partition_value);

    return "VALUES $partition_value";

  }

}