<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IndexedBy
{

  protected string $indexed_by = '';

  public function indexedBy(string $index): static
  {

    $this->indexed_by = "INDEXED BY $index";

    return $this;

  }

  public function notIndexed(): static
  {

    $this->indexed_by = 'NOT INDEXED';

    return $this;

  }

  protected function getIndexedBy(): string
  {
    return $this->indexed_by;
  }

}