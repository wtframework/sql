<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Clustering
{

  protected string $clustering = '';

  public function clustering(): static
  {

    $this->clustering = 'CLUSTERING = YES';

    return $this;

  }

  public function noClustering(): static
  {

    $this->clustering = 'CLUSTERING = NO';

    return $this;

  }

  protected function getClustering(): string
  {
    return $this->clustering;
  }

}