<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Lock
{

  protected string $lock = '';

  public function lockDefault(): static
  {

    $this->lock = 'LOCK DEFAULT';

    return $this;

  }

  public function lockNone(): static
  {

    $this->lock = 'LOCK NONE';

    return $this;

  }

  public function lockShared(): static
  {

    $this->lock = 'LOCK SHARED';

    return $this;

  }

  public function lockExclusive(): static
  {

    $this->lock = 'LOCK EXCLUSIVE';

    return $this;

  }

  protected function getLock(): string
  {
    return $this->lock;
  }

}