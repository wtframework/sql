<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Table as SQLTable;

trait Table
{

  protected array $table = [];

  public function table(string|SQLTable|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->table[] = $table;
    }

    return $this;

  }

  protected function getTable(): string
  {
    return implode(', ', $this->table);
  }

}