<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DropIndex
{

  protected array $drop_index = [];

  public function dropIndex(
    string|array $index,
    bool $if_exists = false
  ): static
  {

    $if_exists = $if_exists ? ' IF EXISTS' : '';

    foreach ((array) $index as $c)
    {
      $this->drop_index[] = "DROP INDEX$if_exists $c";
    }

    return $this;

  }

  public function dropIndexIfExists(string|array $index): static
  {

    return $this->dropIndex(
      index: $index,
      if_exists: true
    );

  }

  protected function getDropIndex(): string
  {
    return implode(', ', $this->drop_index);
  }

}