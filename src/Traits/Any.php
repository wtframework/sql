<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Any
{

  protected string $any = '';

  public function any(): static
  {

    $this->any = 'ANY';

    return $this;

  }

  protected function getAny(): string
  {
    return $this->any;
  }

}