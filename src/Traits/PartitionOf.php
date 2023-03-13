<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Table;

trait PartitionOf
{

  protected string $partition_of = '';

  public function partitionOf(string|Table $table): static
  {

    $this->partition_of = "PARTITION OF $table";

    $this->for_values = 'DEFAULT';

    return $this;

  }

  protected function getPartitionOf(): string
  {
    return $this->partition_of;
  }

}