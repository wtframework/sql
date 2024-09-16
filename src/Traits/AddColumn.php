<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Column;

trait AddColumn
{

  protected array $add_column = [];

  public function addColumn(string $name): Column
  {

    $this->add_column[] = $column = (new Column($name))->use($this->grammar());

    return $column;

  }

  protected function getAddColumn(): string
  {

    if (empty($this->add_column))
    {
      return '';
    }

    foreach ($this->add_column as $column)
    {

      $add_column[] = "ADD $column";

      $this->mergeBindings($column);

    }

    return implode(', ', $add_column);

  }

}