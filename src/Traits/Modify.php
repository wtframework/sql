<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Column;
use WTFramework\SQL\Interfaces\HasBindings;

trait Modify
{

  protected array $modify = [];

  public function modify(
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

      $this->modify[] = $column;

    }

    return $this;

  }

  protected function getModify(): string
  {

    if (empty($this->modify))
    {
      return '';
    }

    foreach ($this->modify as $column)
    {

      $modify[] = "MODIFY COLUMN $column";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

    }

    return implode(', ', $modify);

  }

}