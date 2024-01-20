<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Inherit
{

  protected array $inherit = [];

  public function inherit(
    string|HasBindings|array $table,
    bool $no = false
  ): static
  {

    $no = $no ? 'NO ' : '';

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->inherit[] = "{$no}INHERIT $table";
    }

    return $this;

  }

  public function noInherit(string|HasBindings|array $table): static
  {

    return $this->inherit(
      table: $table,
      no: true
    );

  }

  protected function getInherit(): string
  {
    return implode(', ', $this->inherit);
  }

}