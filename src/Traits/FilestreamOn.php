<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait FilestreamOn
{

  protected string $filestream_on = '';

  public function filestreamOn(string $name): static
  {

    $this->filestream_on = "FILESTREAM_ON $name";

    return $this;

  }

  protected function getFilestreamOn(): string
  {
    return $this->filestream_on;
  }

}