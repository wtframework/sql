<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AttachPartition
{

  protected string $attach_partition = '';

  public function attachPartition(string $partition): static
  {

    $this->attach_partition = "ATTACH PARTITION $partition";

    $this->for_values = 'DEFAULT';

    return $this;

  }

  protected function getAttachPartition(): string
  {
    return $this->attach_partition;
  }

}