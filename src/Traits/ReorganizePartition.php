<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait ReorganizePartition
{

  protected string $reorganize_partition = '';
  protected array $reorganize_partition_names = [];
  protected array $reorganize_partition_definitions = [];

  public function reorganizePartition(
    string|array $name = null,
    string|HasBindings|array $partition = null
  ): static
  {

    $this->reorganize_partition = 'REORGANIZE PARTITION';

    foreach ((array) $name as $n)
    {
      $this->reorganize_partition_names[] = $n;
    }

    $partitions = is_array($partition) ? $partition : [$partition];

    foreach ($partitions as $partition)
    {
      $this->reorganize_partition_definitions[] = $partition;
    }

    return $this;

  }

  protected function getReorganizePartition(): string
  {

    if (empty($this->reorganize_partition_names))
    {
      return $this->reorganize_partition;
    }

    $names = implode(', ', $this->reorganize_partition_names);

    $partitions = implode(', ', $this->reorganize_partition_definitions);

    foreach ($this->reorganize_partition_definitions as $partition)
    {

      if ($partition instanceof HasBindings)
      {
        $this->mergeBindings($partition);
      }

    }

    return "$this->reorganize_partition $names INTO ($partitions)";

  }

}