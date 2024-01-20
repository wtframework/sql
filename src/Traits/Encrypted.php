<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Encrypted
{

  protected string $encrypted = '';

  public function encrypted(bool $encrypted = true): static
  {

    $encrypted = $encrypted ? 'YES' : 'NO';

    $this->encrypted = "ENCRYPTED $encrypted";

    return $this;

  }

  protected function getEncrypted(): string
  {
    return $this->encrypted;
  }

}