<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Column;
use WTFramework\SQL\Interfaces\HasBindings;

trait CreateColumn
{

  protected array $column = [];

  public function column(
    string|HasBindings|array $column,
    \Closure $definition = null
  ): static
  {

    if (is_array($column))
    {

      return $this->arrayColumn(
        columns: $column,
        definition: $definition
      );

    }

    if (null !== $definition)
    {

      $definition($column = new Column(
        dbms: $this->dbms,
        name: $column
      ));

    }

    $this->column[] = $column;

    return $this;

  }

  protected function arrayColumn(
    array $columns,
    ?\Closure $definition
  ): static
  {

    foreach ($columns as $key => $column)
    {

      $callback = $column instanceof \Closure;

      $this->column(
        column: $callback ? $key : $column,
        definition: $callback ? $column : $definition
      );

    }

    return $this;

  }

  protected function getCreateColumn(): string
  {

    if (empty($this->column))
    {
      return '';
    }

    $column = implode(', ', $this->column);

    foreach ($this->column as $c)
    {

      if ($c instanceof HasBindings)
      {
        $this->mergeBindings(from: $c);
      }

    }

    return $column;

  }

}