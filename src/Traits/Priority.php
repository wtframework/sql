<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Priority
{

  protected string $priority = '';

  public function lowPriority(): static
  {

    $this->priority = 'LOW_PRIORITY';

    return $this;

  }

  public function delayed(): static
  {

    $this->priority = 'DELAYED';

    return $this;

  }

  public function highPriority(): static
  {

    $this->priority = 'HIGH_PRIORITY';

    return $this;

  }

  protected function getPriority(): string
  {
    return $this->priority;
  }

}