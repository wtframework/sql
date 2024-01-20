<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Delayed
{

  protected string $delayed = '';

  public function delayed(): static
  {

    $this->delayed = 'DELAYED';

    return $this;

  }

  protected function getDelayed(): string
  {
    return $this->delayed;
  }

}