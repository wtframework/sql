<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Expression
{

  protected array $expression = [];

  public function column(string|int|float|HasBindings|array $column): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $alias => $column)
    {
      $this->expression[] = [$column, is_string($alias) ? " AS $alias" : ''];
    }

    return $this;

  }

  protected function getExpression(): string
  {

    if (empty($this->expression))
    {
      return '*';
    }

    foreach ($this->expression as [$column, $alias])
    {

      $expression[] = "$column$alias";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings($column);
      }

    }

    return implode(', ', $expression);

  }

}