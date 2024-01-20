<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Virtual
{

  protected string $virtual = '';

  public function virtual(): static
  {

    $this->virtual = 'VIRTUAL';

    return $this;

  }

  protected function getVirtual(): string
  {
    return $this->virtual;
  }

}