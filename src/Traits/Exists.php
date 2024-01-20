<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Exists
{

  protected string $exists = '';

  public function exists(): static
  {

    $this->exists = 'EXISTS';

    return $this;

  }

  public function notExists(): static
  {

    $this->exists = 'NOT EXISTS';

    return $this;

  }

  protected function getExists(): string
  {
    return $this->exists;
  }

}