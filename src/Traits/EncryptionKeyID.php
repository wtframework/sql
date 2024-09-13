<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait EncryptionKeyID
{

  protected string $encryption_key_id = '';

  public function encryptionKeyID(int $value): static
  {

    $this->encryption_key_id = "ENCRYPTION_KEY_ID = $value";

    return $this;

  }

  protected function getEncryptionKeyID(): string
  {
    return $this->encryption_key_id;
  }

}