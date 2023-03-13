<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Spatial
{

  protected string $spatial = '';

  public function spatial(): static
  {

    $this->spatial = 'SPATIAL';

    return $this;

  }

  protected function getSpatial(): string
  {
    return $this->spatial;
  }

}