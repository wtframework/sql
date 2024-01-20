<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Exclude
{

  protected string $exclude = '';

  public function exclude(): static
  {

    $this->exclude = 'EXCLUDE';

    return $this;

  }

  protected function getExclude(): string
  {
    return $this->exclude;
  }

}