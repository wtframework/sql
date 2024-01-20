<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RenameColumn
{

  protected array $rename_column = [];

  public function renameColumn(
    string|array $column,
    string $name = null
  ): static
  {

    if (is_array($column))
    {
      return $this->arrayRenameColumn($column);
    }

    $this->rename_column[] = "RENAME COLUMN $column TO $name";

    return $this;

  }

  protected function arrayRenameColumn(array $columns): static
  {

    foreach ($columns as $column => $name)
    {

      $this->renameColumn(
        column: $column,
        name: $name
      );

    }

    return $this;

  }

  protected function getRenameColumn(): string
  {
    return implode(', ', $this->rename_column);
  }

}