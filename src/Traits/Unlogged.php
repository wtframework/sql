<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Unlogged
{

  protected string $unlogged = '';

  public function unlogged(): static
  {

    $this->unlogged = 'UNLOGGED';

    return $this;

  }

  protected function getUnlogged(): string
  {
    return $this->unlogged;
  }

}