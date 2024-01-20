<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Only
{

  protected string $only = '';

  public function only(): static
  {

    $this->only = 'ONLY';

    return $this;

  }

  protected function getOnly(): string
  {
    return $this->only;
  }

}