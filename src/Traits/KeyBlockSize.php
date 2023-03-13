<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait KeyBlockSize
{

  protected string $key_block_size = '';

  public function keyBlockSize(int $value): static
  {

    $this->key_block_size = "KEY_BLOCK_SIZE $value";

    return $this;

  }

  protected function getKeyBlockSize(): string
  {
    return $this->key_block_size;
  }

}