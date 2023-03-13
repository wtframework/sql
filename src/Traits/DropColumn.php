<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DropColumn
{

  protected array $drop_column = [];

  public function dropColumn(
    string|array $column,
    bool $if_exists = false,
    bool $cascade = false
  ): static
  {

    $if_exists = $if_exists ? ' IF EXISTS' : '';
    $cascade = $cascade ? ' CASCADE' : '';

    foreach ((array) $column as $c)
    {
      $this->drop_column[] = "DROP COLUMN$if_exists $c$cascade";
    }

    return $this;

  }

  public function dropColumnIfExists(string|array $column): static
  {

    return $this->dropColumn(
      column: $column,
      if_exists: true
    );

  }

  public function dropColumnCascade(string|array $column): static
  {

    return $this->dropColumn(
      column: $column,
      cascade: true
    );

  }

  public function dropColumnIfExistsCascade(string|array $column): static
  {

    return $this->dropColumn(
      column: $column,
      if_exists: true,
      cascade: true
    );

  }

  protected function getDropColumn(): string
  {
    return implode(', ', $this->drop_column);
  }

}