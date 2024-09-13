<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Collate
{

  protected string $collate = '';

  public function collate(string $collation): static
  {

    $this->collate = "COLLATE = $collation";

    return $this;

  }

  protected function getCollate(): string
  {
    return $this->collate;
  }

}