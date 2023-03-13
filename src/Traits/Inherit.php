<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Table;

trait Inherit
{

  protected array $inherit = [];

  public function inherit(string|Table|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->inherit[] = "INHERIT $table";
    }

    return $this;

  }

  protected function getInherit(): string
  {
    return implode(', ', $this->inherit);
  }

}