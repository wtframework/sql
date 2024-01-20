<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Replace
{

  protected string $replace = '';

  public function replace(): static
  {

    $this->replace = 'REPLACE';

    return $this;

  }

  protected function getReplace(): string
  {
    return $this->replace;
  }

}