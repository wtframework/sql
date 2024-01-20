<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Partitions
{

  protected string $partitions = '';

  public function partitions(int $value): static
  {

    $this->partitions = "PARTITIONS $value";

    return $this;

  }

  protected function getPartitions(): string
  {
    return $this->partitions;
  }

}