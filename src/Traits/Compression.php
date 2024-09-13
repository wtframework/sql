<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Compression
{

  protected string $compression = '';

  public function compression(string $method): static
  {

    $this->compression = "COMPRESSION = '$method'";

    return $this;

  }

  protected function getCompression(): string
  {
    return $this->compression;
  }

}