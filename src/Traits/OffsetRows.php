<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait OffsetRows
{

  protected int|string|HasBindings $offset_rows = '';

  public function offsetRows(int|HasBindings $rows): static
  {

    $this->offset_rows = $rows;

    return $this;

  }

  protected function getOffsetRows(): string
  {

    if ('' === $this->offset_rows)
    {
      return '';
    }

    $offset_rows = (string) $this->offset_rows;

    if ($this->offset_rows instanceof HasBindings)
    {
      $this->mergeBindings($this->offset_rows);
    }

    return "OFFSET $offset_rows ROWS";

  }

}