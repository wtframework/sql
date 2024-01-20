<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AutoIncrement
{

  protected string $auto_increment = '';

  public function autoIncrement(int $value): static
  {

    $this->auto_increment = "AUTO_INCREMENT $value";

    return $this;

  }

  protected function getAutoIncrement(): string
  {
    return $this->auto_increment;
  }

}