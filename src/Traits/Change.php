<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Column;

trait Change
{

  protected array $change_column = [];

  public function change(string $old_name, string $new_name): Column
  {

    $this->change_column[] = [$old_name, $column = new Column($new_name)];

    return $column;

  }

  protected function getChange(): string
  {

    if (empty($this->change_column))
    {
      return '';
    }

    foreach ($this->change_column as [$old_name, $column])
    {

      $change_column[] = "CHANGE COLUMN $old_name $column";

      $this->mergeBindings($column);

    }

    return implode(', ', $change_column);

  }

}