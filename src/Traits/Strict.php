<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Strict
{

  protected string $strict = '';

  public function strict(): static
  {

    $this->strict = 'STRICT';

    return $this;

  }

  protected function getStrict(): string
  {
    return $this->strict;
  }

}