<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait TablePartition
{

  protected array $partition = [];

  public function partition(string|array $partitions): static
  {

    foreach ((array) $partitions as $partition)
    {
      $this->partition[] = $partition;
    }

    return $this;

  }

  protected function getPartition(): string
  {

    if (empty($this->partition))
    {
      return '';
    }

    $partition = implode(', ', $this->partition);

    return "PARTITION ($partition)";

  }

}