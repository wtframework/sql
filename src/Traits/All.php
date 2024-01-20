<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait All
{

  protected string $all = '';

  public function all(): static
  {

    $this->all = 'ALL';

    return $this;

  }

  protected function getAll(): string
  {
    return $this->all;
  }

}