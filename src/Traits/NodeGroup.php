<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait NodeGroup
{

  protected string $node_group = '';

  public function nodeGroup(string $name): static
  {

    $this->node_group = "NODEGROUP = $name";

    return $this;

  }

  protected function getNodeGroup(): string
  {
    return $this->node_group;
  }

}