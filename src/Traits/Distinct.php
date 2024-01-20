<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Distinct
{

  protected string $distinct = '';

  public function distinct(): static
  {

    $this->distinct = 'DISTINCT';

    return $this;

  }

  protected function getDistinct(): string
  {
    return $this->distinct;
  }

}