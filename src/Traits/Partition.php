<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Partition as ServicesPartition;

trait Partition
{

  protected array $partition = [];

  public function partition(string $name): ServicesPartition
  {

    $this->partition[] = $partition = new ServicesPartition($name);

    return $partition;

  }

  protected function getPartition(): string
  {

    if (empty($this->partition))
    {
      return '';
    }

    $partition = implode(', ', $this->partition);

    foreach ($this->partition as $p)
    {
      $this->mergeBindings($p);
    }

    return "($partition)";

  }

}