<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OrReplace
{

  protected string $or_replace = '';

  public function orReplace(): static
  {

    $this->or_replace = 'OR REPLACE';

    return $this;

  }

  protected function getOrReplace(): string
  {
    return $this->or_replace;
  }

}