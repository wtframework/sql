<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Unique
{

  protected array $unique = [];

  public function unique(string|array $column): static
  {

    $columns = is_array(current((array) $column)) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->unique[] = implode(', ', (array) $column);
    }

    return $this;

  }

  protected function getUnique(): string
  {

    if (empty($this->unique))
    {
      return '';
    }

    foreach ($this->unique as $column)
    {
      $unique[] = "UNIQUE ($column)";
    }

    return implode(', ', $unique);

  }

}