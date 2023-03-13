<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Ignored
{

  protected string $ignored = '';

  public function ignored(): static
  {

    $this->ignored = 'IGNORED';

    return $this;

  }

  public function notIgnored(): static
  {

    $this->ignored = 'NOT IGNORED';

    return $this;

  }

  protected function getIgnored(): string
  {
    return $this->ignored;
  }

}