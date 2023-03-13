<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Table;

trait NoInherit
{

  protected array $no_inherit = [];

  public function noInherit(string|Table|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->no_inherit[] = "NO INHERIT $table";
    }

    return $this;

  }

  protected function getNoInherit(): string
  {
    return implode(', ', $this->no_inherit);
  }

}