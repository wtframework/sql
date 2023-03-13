<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RowsExamined
{

  protected string $rows_examined = '';

  public function rowsExamined(int $row_count): static
  {

    $this->rows_examined = "ROWS EXAMINED $row_count";

    return $this;

  }

  protected function getRowsExamined(): string
  {
    return $this->rows_examined;
  }

}