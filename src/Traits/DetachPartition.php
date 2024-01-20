<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DetachPartition
{

  protected string $detach_partition = '';

  public function detachPartition(string $name): static
  {

    $this->detach_partition = "DETACH PARTITION $name";

    return $this;

  }

  public function detachPartitionConcurrently(string $name): static
  {

    $this->detach_partition = "DETACH PARTITION $name CONCURRENTLY";

    return $this;

  }

  public function detachPartitionFinalize(string $name): static
  {

    $this->detach_partition = "DETACH PARTITION $name FINALIZE";

    return $this;

  }

  protected function getDetachPartition(): string
  {
    return $this->detach_partition;
  }

}