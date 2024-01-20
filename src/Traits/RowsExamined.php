<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait RowsExamined
{

  protected int|string|HasBindings $rows_examined = '';

  public function rowsExamined(int|string|HasBindings $rows_examined): static
  {

    $this->rows_examined = $rows_examined;

    return $this;

  }

  protected function getRowsExamined(): string
  {

    if ('' === $this->rows_examined)
    {
      return '';
    }

    $rows_examined = (string) $this->rows_examined;

    if ($this->rows_examined instanceof HasBindings)
    {
      $this->mergeBindings($this->rows_examined);
    }

    return "ROWS EXAMINED $rows_examined";

  }

}