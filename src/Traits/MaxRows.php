<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait MaxRows
{

  protected string $max_rows = '';

  public function maxRows(int $value): static
  {

    $this->max_rows = "MAX_ROWS = $value";

    return $this;

  }

  protected function getMaxRows(): string
  {
    return $this->max_rows;
  }

}