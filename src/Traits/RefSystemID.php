<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RefSystemID
{

  protected string $ref_system_id = '';

  public function refSystemID(int $value): static
  {

    $this->ref_system_id = "REF_SYSTEM_ID = $value";

    return $this;

  }

  protected function getRefSystemID(): string
  {
    return $this->ref_system_id;
  }

}