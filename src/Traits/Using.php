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

    foreach ($tables as $alias => $table)
    {
      $this->using[] = [$table, is_string($alias) ? " AS $alias" : ''];
    }

    return $this;

  }

  protected function getUsing(): string
  {

    if (empty($this->using))
    {
      return '';
    }

    foreach ($this->using as [$table, $alias])
    {

      $using[] = "$table$alias";

      if ($table instanceof HasBindings)
      {
        $this->mergeBindings($table);
      }

    }

    $using = implode(', ', $using);

    return "USING $using";

  }

}