<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Partition
{

  protected array $partition = [];

  public function partition(string|HasBindings|array $partition): static
  {

    foreach ((array) $partition as $p)
    {
      $this->partition[] = $p;
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

    foreach ($this->partition as $p)
    {

      if ($p instanceof HasBindings)
      {
        $this->mergeBindings($p);
      }

    }

    return "($partition)";

  }

}