<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ColumnUnique
{

  protected string $unique = '';

  public function unique(): static
  {

    $this->unique = 'UNIQUE';

    return $this;

  }

  protected function getUnique(): string
  {
    return $this->unique;
  }

}