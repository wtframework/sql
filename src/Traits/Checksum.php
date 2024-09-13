<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Checksum
{

  protected string $checksum = '';

  public function checksum(bool $value = true): static
  {

    $value = (int) $value;

    $this->checksum = "CHECKSUM = $value";

    return $this;

  }

  protected function getChecksum(): string
  {
    return $this->checksum;
  }

}