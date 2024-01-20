<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Change
{

  protected array $change_column = [];

  public function change(
    string|array $column,
    string|HasBindings $definition = null,
    bool $if_exists = false
  ): static
  {

    if (is_array($column))
    {

      return $this->arrayChange(
        columns: $column,
        if_exists: $if_exists
      );

    }

    $if_exists = $if_exists ? 'IF EXISTS ' : '';

    $this->change_column[] = ["$if_exists$column", $definition];

    return $this;

  }

  public function changeIfExists(
    string|array $column,
    string|HasBindings $definition = null
  ): static
  {

    return $this->change(
      column: $column,
      definition: $definition,
      if_exists: true
    );

  }

  public function arrayChange(
    array $columns,
    bool $if_exists
  ): static
  {

    foreach ($columns as $column => $definition)
    {

      $this->change(
        column: $column,
        definition: $definition,
        if_exists: $if_exists
      );

    }

    return $this;

  }

  protected function getChange(): string
  {

    if (empty($this->change_column))
    {
      return '';
    }

    foreach ($this->change_column as [$column, $definition])
    {

      $change_column[] = "CHANGE COLUMN $column $definition";

      if ($definition instanceof HasBindings)
      {
        $this->mergeBindings($definition);
      }

    }

    return implode(', ', $change_column);

  }

}