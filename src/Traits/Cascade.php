<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Cascade
{

  protected string $cascade = '';

  public function cascade(): static
  {

    $this->cascade = 'CASCADE';

    return $this;

  }

  protected function getCascade(): string
  {
    return $this->cascade;
  }

}