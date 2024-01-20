<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Concurrently
{

  protected string $concurrently = '';

  public function concurrently(): static
  {

    $this->concurrently = 'CONCURRENTLY';

    return $this;

  }

  protected function getConcurrently(): string
  {
    return $this->concurrently;
  }

}