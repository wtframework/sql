<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Limit
{

  protected string $limit = '';
  protected string $offset = '';

  public function limit(
    int $row_count,
    int $offset = null
  ): static
  {

    $this->limit = "LIMIT $row_count";

    if ($offset)
    {
      $this->offset = " OFFSET $offset";
    }

    return $this;

  }

  protected function getLimit(): string
  {
    return $this->limit . $this->offset;
  }

}