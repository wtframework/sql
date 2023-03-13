<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DetachPartition
{

  protected string $detach_partition = '';
  protected string $detach_partition_suffix = '';

  public function detachPartition(string $partition): static
  {

    $this->detach_partition = "DETACH PARTITION $partition";

    return $this;

  }

  public function concurrently(): static
  {

    $this->detach_partition_suffix = ' CONCURRENTLY';

    return $this;

  }

  public function finalize(): static
  {

    $this->detach_partition_suffix = ' FINALIZE';

    return $this;

  }

  protected function getDetachPartition(): string
  {
    return "$this->detach_partition$this->detach_partition_suffix";
  }

}