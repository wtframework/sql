<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait CreatePartitionBy
{

  protected string $create_partition_by_type = '';
  protected array $create_partition_by = [];

  public function partitionByRange(
    string|HasBindings|array $column,
    string $collation = '',
    string $opclass = ''
  ): static
  {

    $this->create_partition_by_type = 'RANGE';

    return $this->createPartitionBy(
      column: $column,
      collation: $collation,
      opclass: $opclass
    );

  }

  public function partitionByList(
    string|HasBindings $column,
    string $collation = '',
    string $opclass = ''
  ): static
  {

    $this->create_partition_by_type = 'LIST';

    return $this->createPartitionBy(
      column: $column,
      collation: $collation,
      opclass: $opclass
    );

  }

  public function partitionByHash(
    string|HasBindings|array $column,
    string $collation = '',
    string $opclass = ''
  ): static
  {

    $this->create_partition_by_type = 'HASH';

    return $this->createPartitionBy(
      column: $column,
      collation: $collation,
      opclass: $opclass
    );

  }

  protected function createPartitionBy(
    string|HasBindings|array $column,
    string $collation = '',
    string $opclass = ''
  ): static
  {

    $columns = is_array($column) ? $column : [$column];

    if ($collation)
    {
      $collation = " COLLATE $collation";
    }

    if ($opclass)
    {
      $opclass = " $opclass";
    }

    foreach ($columns as $column)
    {
      $this->create_partition_by[] = [$column, $collation, $opclass];
    }

    return $this;

  }

  protected function getCreatePartitionBy(): string
  {

    if (empty($this->create_partition_by))
    {
      return '';
    }

    foreach ($this->create_partition_by as [$column, $collation, $opclass])
    {

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

      $partition_by[] = "$column$collation$opclass";

    }

    $partition_by = implode(', ', $partition_by);

    return "PARTITION BY $this->create_partition_by_type ($partition_by)";

  }

}