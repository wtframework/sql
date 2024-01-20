<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Keys
{

  protected string $keys = '';

  public function enableKeys(): static
  {

    $this->keys = 'ENABLE KEYS';

    return $this;

  }

  public function disableKeys(): static
  {

    $this->keys = 'DISABLE KEYS';

    return $this;

  }

  protected function getKeys(): string
  {
    return $this->keys;
  }

}