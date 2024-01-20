<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait AlterPartition
{

  protected array $alter_partition = [];

  public function convertPartition(
    string $name,
    string|HasBindings $table
  ): static
  {

    $this->alter_partition[] = "CONVERT PARTITION $name TO TABLE $table";

    return $this;

  }

  public function dropPartition(
    string|array $name,
    bool $if_exists = false
  ): static
  {

    $if_exists = $if_exists ? ' IF EXISTS' : '';

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "DROP PARTITION$if_exists $names";

    return $this;

  }

  public function dropPartitionIfExists(string|array $name): static
  {

    return $this->dropPartition(
      name: $name,
      if_exists: true
    );

  }

  public function discardPartition(string|array $name = 'ALL'): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "DISCARD PARTITION $names TABLESPACE";

    return $this;

  }

  public function importPartition(string|array $name = 'ALL'): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "IMPORT PARTITION $names TABLESPACE";

    return $this;

  }

  public function truncatePartition(string|array $name): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "TRUNCATE PARTITION $names";

    return $this;

  }

  public function coalescePartition(int $number): static
  {

    $this->alter_partition[] = "COALESCE PARTITION $number";

    return $this;

  }

  public function analyzePartition(string|array $name): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "ANALYZE PARTITION $names";

    return $this;

  }

  public function checkPartition(string|array $name): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "CHECK PARTITION $names";

    return $this;

  }

  public function optimizePartition(string|array $name): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "OPTIMIZE PARTITION $names";

    return $this;

  }

  public function rebuildPartition(string|array $name): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "REBUILD PARTITION $names";

    return $this;

  }

  public function repairPartition(string|array $name): static
  {

    $names = implode(', ', (array) $name);

    $this->alter_partition[] = "REPAIR PARTITION $names";

    return $this;

  }

  public function exchangePartition(
    string $name,
    string|HasBindings $table,
    $without_validation = false
  ): static
  {

    $without_validation = $without_validation ? ' WITHOUT VALIDATION' : '';

    $this->alter_partition[] =
      "EXCHANGE PARTITION $name WITH TABLE $table$without_validation";

    return $this;

  }

  public function exchangePartitionWithoutValidation(
    string $name,
    string|HasBindings $table
  ): static
  {

    return $this->exchangePartition(
      name: $name,
      table: $table,
      without_validation: true
    );

  }

  public function removePartitioning(): static
  {

    $this->alter_partition[] = 'REMOVE PARTITIONING';

    return $this;

  }

  protected function getAlterPartition(): string
  {
    return implode(' ', $this->alter_partition);
  }

}