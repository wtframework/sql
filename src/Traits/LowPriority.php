<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait LowPriority
{

  protected string $low_priority = '';

  public function lowPriority(): static
  {

    $this->low_priority = 'LOW_PRIORITY';

    return $this;

  }

  protected function getLowPriority(): string
  {
    return $this->low_priority;
  }

}