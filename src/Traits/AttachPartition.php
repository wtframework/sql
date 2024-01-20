<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AttachPartition
{

  protected string $attach_partition = '';

  public function attachPartition(string $name): static
  {

    $this->attach_partition = "ATTACH PARTITION $name";

    return $this;

  }

  protected function getAttachPartition(): string
  {
    return $this->attach_partition;
  }

}