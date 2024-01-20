<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Inherits
{

  protected array $inherits = [];

  public function inherits(string|HasBindings|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->inherits[] = $table;
    }

    return $this;

  }

  protected function getInherits(): string
  {

    if (empty($this->inherits))
    {
      return '';
    }

    $inherits = implode(', ', $this->inherits);

    return "INHERITS ($inherits)";

  }

}