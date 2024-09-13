<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Raw;

trait Values
{

  protected array $values = [];

  public function values(array $values): static
  {

    $values = is_array(current($values)) ? $values : [$values];

    foreach ($values as $v)
    {

      foreach ($v as &$value)
      {

        if (is_string($value))
        {
          $value = (new Raw('?'))->bind($value);
        }

        $value ??= "NULL";

      }

      $this->values[] = $v;

    }

    return $this;

  }

  protected function getValues(string $default = ''): string
  {

    if (empty($this->values))
    {
      return $default;
    }

    foreach ($this->values as $v)
    {

      $values[] = implode(', ', $v);

      foreach ($v as $value)
      {

        if ($value instanceof HasBindings)
        {
          $this->mergeBindings($value);
        }

      }

    }

    $values = implode('), (', $values);

    return "VALUES ($values)";

  }

}