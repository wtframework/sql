<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IfExists
{

  protected string $if_exists = '';

  public function ifExists(): static
  {

    $this->if_exists = 'IF EXISTS';

    return $this;

  }

  protected function getIfExists(): string
  {
    return $this->if_exists;
  }

}