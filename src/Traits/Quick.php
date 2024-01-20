<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Quick
{

  protected string $quick = '';

  public function quick(): static
  {

    $this->quick = 'QUICK';

    return $this;

  }

  protected function getQuick(): string
  {
    return $this->quick;
  }

}