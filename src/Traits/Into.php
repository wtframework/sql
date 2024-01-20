<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Into
{

  protected array $into = [];

  public function into(string|HasBindings|array $table): static
  {

    $table = is_array($table) ? $table : [$table];

    $alias = key($table);

    $this->into = [current($table), is_string($alias) ? " AS $alias" : ''];

    return $this;

  }

  protected function getInto(): string
  {

    if (empty($this->into))
    {
      return '';
    }

    [$table, $alias] = $this->into;

    $into = "INTO $table$alias";

    if ($table instanceof HasBindings)
    {
      $this->mergeBindings($table);
    }

    return $into;

  }

}