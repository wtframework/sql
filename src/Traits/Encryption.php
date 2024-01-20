<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Encryption
{

  protected string $encryption = '';

  public function encryption(bool $encryption = true): static
  {

    $encryption = $encryption ? 'Y' : 'N';

    $this->encryption = "ENCRYPTION '$encryption'";

    return $this;

  }

  protected function getEncryption(): string
  {
    return $this->encryption;
  }

}