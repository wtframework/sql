<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Clustered
{

  protected string $clustered = '';

  public function clustered(): static
  {

    $this->clustered = 'CLUSTERED';

    return $this;

  }

  public function nonClustered(): static
  {

    $this->clustered = 'NONCLUSTERED';

    return $this;

  }

  protected function getClustered(): string
  {
    return $this->clustered;
  }

}