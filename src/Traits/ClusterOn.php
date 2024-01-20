<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ClusterOn
{

  protected string $cluster_on = '';

  public function clusterOn(string $index): static
  {

    $this->cluster_on = "CLUSTER ON $index";

    return $this;

  }

  protected function getClusterOn(): string
  {
    return $this->cluster_on;
  }

}