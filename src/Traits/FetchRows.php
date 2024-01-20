<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait FetchRows
{

  protected int|string|HasBindings $fetch_rows = '';
  protected string $fetch_rows_suffix = 'ONLY';

  public function fetchRows(int|HasBindings $rows): static
  {

    $this->fetch_rows = $rows;

    return $this;

  }

  public function fetchRowsWithTies(int|HasBindings $rows): static
  {

    $this->fetch_rows_suffix = 'WITH TIES';

    return $this->fetchRows($rows);

  }

  protected function getFetchRows(): string
  {

    if ('' === $this->fetch_rows)
    {
      return '';
    }

    $fetch_rows = (string) $this->fetch_rows;

    if ($this->fetch_rows instanceof HasBindings)
    {
      $this->mergeBindings($this->fetch_rows);
    }

    return "FETCH NEXT $fetch_rows ROWS $this->fetch_rows_suffix";

  }

}