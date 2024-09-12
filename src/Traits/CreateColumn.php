<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Column;

trait CreateColumn
{

  protected array $column = [];

  public function column(string $name): Column
  {

    $this->column[] = $column = new Column($name);

    return $column;

  }

  protected function getColumn(): string
  {

    if (empty($this->column))
    {
      return '';
    }

    $column = implode(', ', $this->column);

    foreach ($this->column as $c)
    {
      $this->mergeBindings($c);
    }

    return $column;

  }

}