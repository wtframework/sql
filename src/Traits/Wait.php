<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Wait
{

  protected string $wait = '';

  public function wait(int $wait): static
  {

    $this->wait = "WAIT $wait";

    return $this;

  }

  public function noWait(): static
  {

    $this->wait = "NOWAIT";

    return $this;

  }

  protected function getWait(): string
  {
    return $this->wait;
  }

}