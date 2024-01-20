<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait HighPriority
{

  protected string $high_priority = '';

  public function highPriority(): static
  {

    $this->high_priority = 'HIGH_PRIORITY';

    return $this;

  }

  protected function getHighPriority(): string
  {
    return $this->high_priority;
  }

}