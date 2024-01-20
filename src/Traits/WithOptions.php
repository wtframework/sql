<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait WithOptions
{

  protected string $with_options = '';

  public function withOptions(): static
  {

    $this->with_options = 'WITH OPTIONS';

    return $this;

  }

  protected function getWithOptions(): string
  {
    return $this->with_options;
  }

}