<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait First
{

  protected string $first = '';

  public function first(): static
  {

    $this->first = 'FIRST';

    return $this;

  }

  protected function getFirst(): string
  {
    return $this->first;
  }

}