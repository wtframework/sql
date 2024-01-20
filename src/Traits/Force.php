<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Force
{

  protected string $force = '';

  public function force(): static
  {

    $this->force = 'FORCE';

    return $this;

  }

  protected function getForce(): string
  {
    return $this->force;
  }

}