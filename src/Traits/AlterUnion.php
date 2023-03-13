<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Table;

trait AlterUnion
{

  protected array $union = [];

  public function union(string|Table|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->union[] = $table;
    }

    return $this;

  }

  protected function getAlterUnion(): string
  {

    if (empty($this->union))
    {
      return '';
    }

    $union = implode(', ', $this->union);

    return "UNION ($union)";

  }

}