<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Using
{

  protected array $using = [];

  public function using(string|HasBindings|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->using[] = $table;
    }

    return $this;

  }

  protected function getUsing(): string
  {

    if (empty($this->using))
    {
      return '';
    }

    $using = implode(', ', $this->using);

    foreach ($this->using as $table)
    {

      if ($table instanceof HasBindings)
      {
        $this->mergeBindings(using: $table);
      }

    }

    return "USING $using";

  }

}