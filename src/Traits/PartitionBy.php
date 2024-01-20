<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait PartitionBy
{

  protected string $partition_by = '';

  public function partitionByHash(string $expression): static
  {

    $this->partition_by = "PARTITION BY HASH($expression)";

    return $this;

  }

  public function partitionByLinearHash(string $expression): static
  {

    $this->partition_by = "PARTITION BY LINEAR HASH($expression)";

    return $this;

  }

  public function partitionByKey(string|array $column): static
  {

    $column = implode(', ', (array) $column);

    $this->partition_by = "PARTITION BY KEY($column)";

    return $this;

  }

  public function partitionByLinearKey(string|array $column): static
  {

    $column = implode(', ', (array) $column);

    $this->partition_by = "PARTITION BY LINEAR KEY($column)";

    return $this;

  }

  public function partitionByRange(string|array $expression): static
  {

    $expression = implode(', ', (array) $expression);

    $this->partition_by = "PARTITION BY RANGE($expression)";

    return $this;

  }

  public function partitionByRangeColumns(string|array $column): static
  {

    $column = implode(', ', (array) $column);

    $this->partition_by = "PARTITION BY RANGE COLUMNS($column)";

    return $this;

  }

  public function partitionByList(string $expression): static
  {

    $this->partition_by = "PARTITION BY LIST($expression)";

    return $this;

  }

  public function partitionByListColumns(string|array $column): static
  {

    $column = implode(', ', (array) $column);

    $this->partition_by = "PARTITION BY LIST COLUMNS($column)";

    return $this;

  }

  protected function getPartitionBy(): string
  {
    return $this->partition_by;
  }

}