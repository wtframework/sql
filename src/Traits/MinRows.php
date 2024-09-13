<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait MinRows
{

  protected string $min_rows = '';

  public function minRows(int $value): static
  {

    $this->min_rows = "MIN_ROWS = $value";

    return $this;

  }

  protected function getMinRows(): string
  {
    return $this->min_rows;
  }

}