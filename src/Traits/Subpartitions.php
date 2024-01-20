<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Subpartitions
{

  protected string $subpartitions = '';

  public function subpartitions(int $value): static
  {

    $this->subpartitions = "SUBPARTITIONS $value";

    return $this;

  }

  protected function getSubpartitions(): string
  {
    return $this->subpartitions;
  }

}