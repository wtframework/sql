<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RenameIndex
{

  protected array $rename_index = [];

  public function renameIndex(
    string|array $index,
    string $name = null
  ): static
  {

    if (is_array($index))
    {
      return $this->arrayRenameIndex($index);
    }

    $this->rename_index[] = "RENAME INDEX $index TO $name";

    return $this;

  }

  protected function arrayRenameIndex(array $indexes): static
  {

    foreach ($indexes as $index => $name)
    {

      $this->renameIndex(
        index: $index,
        name: $name
      );

    }

    return $this;

  }

  protected function getRenameIndex(): string
  {
    return implode(', ', $this->rename_index);
  }

}