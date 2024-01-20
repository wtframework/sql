<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait StatsPersistent
{

  protected string $stats_persistent = '';

  public function statsPersistent(bool $value = true): static
  {

    $value = (int) $value;

    $this->stats_persistent = "STATS_PERSISTENT $value";

    return $this;

  }

  public function statsPersistentDefault(): static
  {

    $this->stats_persistent = "STATS_PERSISTENT DEFAULT";

    return $this;

  }

  protected function getStatsPersistent(): string
  {
    return $this->stats_persistent;
  }

}