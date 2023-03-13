<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Column;
use WTFramework\SQL\Interfaces\HasBindings;

trait AddColumn
{

  protected array $add_column = [];

  public function addColumn(
    string|HasBindings|array $column,
    \Closure $definition = null
  ): static
  {

    $columns = is_array($column) ? $column : [$column];

    foreach ($columns as $key => $column)
    {

      if ($column instanceof \Closure)
      {

        $column($column = new Column(
          dbms: $this->dbms,
          name: is_string($key) ? $key : null
        ));

      }

      elseif (null !== $definition)
      {

        $definition($column = new Column(
          dbms: $this->dbms,
          name: $column
        ));

      }

      $this->add_column[] = $column;

    }

    return $this;

  }

  protected function getAddColumn(): string
  {

    if (empty($this->add_column))
    {
      return '';
    }

    foreach ($this->add_column as $column)
    {

      $add_column[] = "ADD COLUMN $column";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

    }

    return implode(', ', $add_column);

  }

}