<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Enforced
{

  protected string $enforced = '';

  public function enforced(): static
  {

    $this->enforced = 'ENFORCED';

    return $this;

  }

  public function notEnforced(): static
  {

    $this->enforced = 'NOT ENFORCED';

    return $this;

  }

  protected function getEnforced(): string
  {
    return $this->enforced;
  }

}