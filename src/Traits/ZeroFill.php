<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ZeroFill
{

  protected string $zero_fill = '';

  public function zeroFill(): static
  {

    $this->zero_fill = 'ZEROFILL';

    return $this;

  }

  protected function getZeroFill(): string
  {
    return $this->zero_fill;
  }

}