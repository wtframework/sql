<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Table;

trait From
{

  protected array $from = [];

  public function from(string|Table|HasBindings|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $table)
    {
      $this->from[] = $table;
    }

    return $this;

  }

  protected function getFrom(): string
  {

    if (empty($this->from))
    {
      return '';
    }

    $from = implode(', ', $this->from);

    foreach ($this->from as $table)
    {

      if ($table instanceof HasBindings)
      {
        $this->mergeBindings(from: $table);
      }

    }

    return "FROM $from";

  }

}