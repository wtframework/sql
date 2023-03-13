<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AlterPartition
{

  protected array $alter_partition = [];

  public function dropPartition(
    string|array $partition,
    bool $if_exists = false
  ): static
  {

    $if_exists = $if_exists ? ' IF EXISTS' : '';

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "DROP PARTITION$if_exists $partition";

    return $this;

  }

  public function dropPartitionIfExists(string|array $partition): static
  {

    return $this->dropPartition(
      partition: $partition,
      if_exists: true
    );

  }

  public function coalescePartition(int $number): static
  {

    $this->alter_partition[] = "COALESCE PARTITION $number";

    return $this;

  }

  public function analyzePartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "ANALYZE PARTITION $partition";

    return $this;

  }

  public function checkPartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "CHECK PARTITION $partition";

    return $this;

  }

  public function optimizePartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "OPTIMIZE PARTITION $partition";

    return $this;

  }

  public function rebuildPartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "REBUILD PARTITION $partition";

    return $this;

  }

  public function repairPartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "REPAIR PARTITION $partition";

    return $this;

  }

  public function exchangePartition(
    string $partition,
    string $table,
    bool $validation = null
  ): static
  {

    if (null !== $validation)
    {
      $validation = $validation ? ' WITH VALIDATION' : ' WITHOUT VALIDATION';
    }

    $this->alter_partition[]
      = "EXCHANGE PARTITION $partition WITH TABLE $table$validation";

    return $this;

  }

  public function exchangePartitionWithValidation(
    string $partition,
    string $table
  ): static
  {

    return $this->exchangePartition(
      partition: $partition,
      table: $table,
      validation: true
    );

  }

  public function exchangePartitionWithoutValidation(
    string $partition,
    string $table
  ): static
  {

    return $this->exchangePartition(
      partition: $partition,
      table: $table,
      validation: false
    );

  }

  public function removePartitioning(): static
  {

    $this->alter_partition[] = 'REMOVE PARTITIONING';

    return $this;

  }

  public function truncatePartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "TRUNCATE PARTITION $partition";

    return $this;

  }

  public function importPartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "IMPORT PARTITION $partition TABLESPACE";

    return $this;

  }

  public function discardPartition(string|array $partition): static
  {

    $partition = implode(', ', (array) $partition);

    $this->alter_partition[] = "DISCARD PARTITION $partition TABLESPACE";

    return $this;

  }

  protected function getAlterPartition(): string
  {

    if (empty($this->alter_partition))
    {
      return '';
    }

    return implode(', ', $this->alter_partition);

  }

}