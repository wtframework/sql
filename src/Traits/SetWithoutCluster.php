<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SetWithoutCluster
{

  protected string $set_without_cluster = '';

  public function setWithoutCluster(): static
  {

    $this->set_without_cluster = 'SET WITHOUT CLUSTER';

    return $this;

  }

  protected function getSetWithoutCluster(): string
  {
    return $this->set_without_cluster;
  }

}