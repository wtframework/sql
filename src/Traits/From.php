<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait From
{

  protected array $from = [];

  public function from(string|HasBindings|array $table): static
  {

    $tables = is_array($table) ? $table : [$table];

    foreach ($tables as $alias => $table)
    {
      $this->from[] = [$table, is_string($alias) ? " AS $alias" : ''];
    }

    return $this;

  }

  protected function getFrom(): string
  {

    if (empty($this->from))
    {
      return '';
    }

    foreach ($this->from as [$table, $alias])
    {

      $from[] = "$table$alias";

      if ($table instanceof HasBindings)
      {
        $this->mergeBindings($table);
      }

    }

    $from = implode(', ', $from);

    return "FROM $from";

  }

}