<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DelayKeyWrite
{

  protected string $delay_key_write = '';

  public function delayKeyWrite(bool $value = true): static
  {

    $value = (int) $value;

    $this->delay_key_write = "DELAY_KEY_WRITE = $value";

    return $this;

  }

  protected function getDelayKeyWrite(): string
  {
    return $this->delay_key_write;
  }

}