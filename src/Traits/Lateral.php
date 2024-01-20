<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Lateral
{

  protected string $lateral = '';

  public function lateral(): static
  {

    $this->lateral = 'LATERAL';

    return $this;

  }

  protected function getLateral(): string
  {
    return $this->lateral;
  }

}