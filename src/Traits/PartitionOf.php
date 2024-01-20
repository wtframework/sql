<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait PartitionOf
{

  protected string $partition_of = '';

  public function partitionOf(string|HasBindings $table): static
  {

    $this->partition_of = "PARTITION OF $table";

    return $this;

  }

  protected function getPartitionOf(): string
  {
    return $this->partition_of;
  }

}