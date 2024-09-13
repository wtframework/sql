<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AvgRowLength
{

  protected string $avg_row_length = '';

  public function avgRowLength(int $value): static
  {

    $this->avg_row_length = "AVG_ROW_LENGTH = $value";

    return $this;

  }

  protected function getAvgRowLength(): string
  {
    return $this->avg_row_length;
  }

}