<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IfNotExists
{

  protected string $if_not_exists = '';

  public function ifNotExists(): static
  {

    $this->if_not_exists = 'IF NOT EXISTS';

    return $this;

  }

  protected function getIfNotExists(): string
  {
    return $this->if_not_exists;
  }

}