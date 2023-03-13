<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Fetch
{

  protected string $fetch = '';
  protected string $fetch_suffix = 'ONLY';
  protected string $fetch_offset = '';

  public function fetch(
    int $row_count,
    int $offset = null
  ): static
  {

    $this->fetch = "FETCH NEXT $row_count ROWS";

    if ($offset)
    {
      $this->fetch_offset = "OFFSET $offset ROWS ";
    }

    return $this;

  }

  public function fetchWithTies(
    int $row_count,
    int $offset = 0
  ): static
  {

    $this->fetch_suffix = 'WITH TIES';

    return $this->fetch(
      row_count: $row_count,
      offset: $offset
    );

  }

  protected function getFetch(): string
  {

    if ('' === $this->fetch)
    {
      return '';
    }

    return "$this->fetch_offset$this->fetch $this->fetch_suffix";

  }

}