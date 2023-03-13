<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Ignore
{

  protected string $ignore = '';

  public function ignore(): static
  {

    $this->ignore = 'IGNORE';

    return $this;

  }

  protected function getIgnore(): string
  {
    return $this->ignore;
  }

}