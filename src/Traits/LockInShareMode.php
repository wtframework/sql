<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait LockInShareMode
{

  protected string $lock_in_share_mode = '';

  public function lockInShareMode(): static
  {

    $this->lock_in_share_mode = 'LOCK IN SHARE MODE';

    return $this;

  }

  public function lockInShareModeWait(int $seconds): static
  {

    $this->lock_in_share_mode = "LOCK IN SHARE MODE WAIT $seconds";

    return $this;

  }

  public function lockInShareModeNoWait(): static
  {

    $this->lock_in_share_mode = 'LOCK IN SHARE MODE NOWAIT';

    return $this;

  }

  public function lockInShareModeSkipLocked(): static
  {

    $this->lock_in_share_mode = 'LOCK IN SHARE MODE SKIP LOCKED';

    return $this;

  }

  protected function getLockInShareMode(): string
  {
    return $this->lock_in_share_mode;
  }

}