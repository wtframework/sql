<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait AddPartition
{

  protected string|HasBindings $add_partition = '';
  protected string $add_partition_if_not_exists = '';

  public function addPartition(string|HasBindings $partition): static
  {

    $this->add_partition = $partition;

    return $this;

  }

  public function addPartitionIfNotExists(string|HasBindings $partition): static
  {

    $this->add_partition_if_not_exists = ' IF NOT EXISTS';

    return $this->addPartition($partition);

  }

  protected function getAddPartition(): string
  {

    if ('' === $this->add_partition)
    {
      return '';
    }

    $add_partition = (string) $this->add_partition;

    if ($this->add_partition instanceof HasBindings)
    {
      $this->mergeBindings($this->add_partition);
    }

    return "ADD PARTITION$this->add_partition_if_not_exists ($add_partition)";

  }

}