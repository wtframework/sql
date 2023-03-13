<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Expression
{

  protected array $expression = [];

  public function column(string|int|HasBindings|array $column): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $column)
    {
      $this->expression[] = $column;
    }

    return $this;

  }

  protected function getExpression(): string
  {

    if (empty($this->expression))
    {
      return '*';
    }

    $expression = implode(', ', $this->expression);

    foreach ($this->expression as $column)
    {

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

    }

    return $expression;

  }

}