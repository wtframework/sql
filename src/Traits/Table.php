<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Table
{

  protected array $table = [];

  public function table(string|HasBindings|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $alias => $table)
    {
      $this->table[] = [$table, is_string($alias) ? " AS $alias" : ''];
    }

    return $this;

  }

  protected function getTable(): string
  {

    if (empty($this->table))
    {
      return '';
    }

    foreach ($this->table as [$t, $alias])
    {

      $table[] = "$t$alias";

      if ($t instanceof HasBindings)
      {
        $this->mergeBindings($t);
      }

    }

    return implode(', ', $table);

  }

}