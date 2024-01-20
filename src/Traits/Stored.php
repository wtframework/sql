<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Stored
{

  protected string $stored = '';

  public function stored(): static
  {

    $this->stored = 'STORED';

    return $this;

  }

  protected function getStored(): string
  {
    return $this->stored;
  }

}