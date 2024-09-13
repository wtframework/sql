<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait PackKeys
{

  protected string $pack_keys = '';

  public function packKeys(bool $value = true): static
  {

    $value = (int) $value;

    $this->pack_keys = "PACK_KEYS = $value";

    return $this;

  }

  public function packKeysDefault(): static
  {

    $this->pack_keys = "PACK_KEYS = DEFAULT";

    return $this;

  }

  protected function getPackKeys(): string
  {
    return $this->pack_keys;
  }

}