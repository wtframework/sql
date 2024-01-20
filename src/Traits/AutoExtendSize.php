<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AutoExtendSize
{

  protected string $auto_extend_size = '';

  public function autoExtendSize(int $value): static
  {

    $this->auto_extend_size = "AUTOEXTEND_SIZE $value";

    return $this;

  }

  protected function getAutoExtendSize(): string
  {
    return $this->auto_extend_size;
  }

}