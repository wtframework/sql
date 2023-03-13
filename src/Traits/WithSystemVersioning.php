<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait WithSystemVersioning
{

  protected string $with_system_versioning = '';

  public function withSystemVersioning(): static
  {

    $this->with_system_versioning = 'WITH SYSTEM VERSIONING';

    return $this;

  }

  public function withoutSystemVersioning(): static
  {

    $this->with_system_versioning = 'WITHOUT SYSTEM VERSIONING';

    return $this;

  }

  protected function getWithSystemVersioning(): string
  {
    return $this->with_system_versioning;
  }

}