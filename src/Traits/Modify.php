<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Column;

trait Modify
{

  protected array $modify_column = [];

  public function modify(string $name): Column
  {

    $this->modify_column[] = $column = new Column($name);

    return $column;

  }

  protected function getModify(): string
  {

    if (empty($this->modify_column))
    {
      return '';
    }

    foreach ($this->modify_column as $column)
    {

      $modify_column[] = "MODIFY COLUMN $column";

      $this->mergeBindings($column);

    }

    return implode(', ', $modify_column);

  }

}