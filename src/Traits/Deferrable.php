<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Deferrable
{

  protected string $deferrable = '';

  public function deferrable(): static
  {

    $this->deferrable = 'DEFERRABLE';

    return $this;

  }

  public function deferrableDeferred(): static
  {

    $this->deferrable = 'DEFERRABLE INITIALLY DEFERRED';

    return $this;

  }

  public function deferrableImmediate(): static
  {

    $this->deferrable = 'DEFERRABLE INITIALLY IMMEDIATE';

    return $this;

  }

  public function notDeferrable(): static
  {

    $this->deferrable = 'NOT DEFERRABLE';

    return $this;

  }

  public function notDeferrableDeferred(): static
  {

    $this->deferrable = 'NOT DEFERRABLE INITIALLY DEFERRED';

    return $this;

  }

  public function notDeferrableImmediate(): static
  {

    $this->deferrable = 'NOT DEFERRABLE INITIALLY IMMEDIATE';

    return $this;

  }

  protected function getDeferrable(): string
  {
    return $this->deferrable;
  }

}