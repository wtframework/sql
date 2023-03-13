<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\Interfaces\HasBindings;

trait Values
{

  protected array $values = [];

  public function values(array $values): static
  {

    if (!empty($values))
    {

      $values = is_array(current($values)) ? $values : [$values];

      foreach ($values as $value)
      {
        $this->values[] = $value;
      }

    }

    return $this;

  }

  protected function getDefaultValues(): string
  {

    return match ($this->dbms)
    {
      DBMS::MariaDB, DBMS::MySQL => 'VALUES ()',
      default => 'DEFAULT VALUES',
    };

  }

  protected function getValues(): string
  {

    if (empty($this->values))
    {
      return $this->getDefaultValues();
    }

    foreach ($this->values as $row)
    {

      foreach ($row as &$value)
      {

        switch (true)
        {

          case null === $value:
            $expression = 'NULL';
            break;

          case $value instanceof HasBindings:
            $expression = (string) $value;
            $this->mergeBindings(from: $value);
            break;

          default:
            $this->bind(values: $value);
            $expression = '?';
            break;

        }

        $value = $expression;

      }

      $values[] = implode(', ', $row);

    }

    $values = implode('), (', $values ?? []);

    return "VALUES ($values)";

  }

}