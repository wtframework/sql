<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RestartIdentity
{

  protected string $restart_identity = '';

  public function restartIdentity(): static
  {

    $this->restart_identity = 'RESTART IDENTITY';

    return $this;

  }

  protected function getRestartIdentity(): string
  {
    return $this->restart_identity;
  }

}