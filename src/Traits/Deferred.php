<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Deferred
{

  protected string $deferred = '';

  public function deferrableInitiallyDeferred(): static
  {

    $this->deferred = 'DEFERRABLE INITIALLY DEFERRED';

    return $this;

  }

  public function deferrableInitiallyImmediate(): static
  {

    $this->deferred = 'DEFERRABLE INITIALLY IMMEDIATE';

    return $this;

  }

  public function notDeferrable(): static
  {

    $this->deferred = 'NOT DEFERRABLE';

    return $this;

  }

  protected function getDeferred(): string
  {
    return $this->deferred;
  }

}