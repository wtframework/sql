<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SystemVersioning
{

  protected string $system_versioning = '';

  public function addSystemVersioning(): static
  {

    $this->system_versioning = 'ADD SYSTEM VERSIONING';

    return $this;

  }

  public function dropSystemVersioning(): static
  {

    $this->system_versioning = 'DROP SYSTEM VERSIONING';

    return $this;

  }

  protected function getSystemVersioning(): string
  {
    return $this->system_versioning;
  }

}