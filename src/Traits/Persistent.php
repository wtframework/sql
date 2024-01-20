<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Persistent
{

  protected string $persistent = '';

  public function persistent(): static
  {

    $this->persistent = 'PERSISTENT';

    return $this;

  }

  protected function getPersistent(): string
  {
    return $this->persistent;
  }

}