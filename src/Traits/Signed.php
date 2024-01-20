<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Signed
{

  protected string $signed = '';

  public function signed(): static
  {

    $this->signed = 'SIGNED';

    return $this;

  }

  public function unsigned(): static
  {

    $this->signed = 'UNSIGNED';

    return $this;

  }

  protected function getSigned(): string
  {
    return $this->signed;
  }

}