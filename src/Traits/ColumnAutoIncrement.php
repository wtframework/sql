<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ColumnAutoIncrement
{

  protected bool $auto_increment = false;

  public function autoIncrement(): static
  {

    $this->auto_increment = true;

    return $this;

  }

  protected function getAutoIncrement(string $auto_increment): string
  {
    return $this->auto_increment ? $auto_increment : '';
  }

}