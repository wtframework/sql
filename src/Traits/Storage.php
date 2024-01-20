<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Storage
{

  protected string $storage = '';

  public function storageDisk(): static
  {

    $this->storage = 'STORAGE DISK';

    return $this;

  }

  public function storageMemory(): static
  {

    $this->storage = 'STORAGE MEMORY';

    return $this;

  }

  protected function getStorage(): string
  {
    return $this->storage;
  }

}