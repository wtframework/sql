<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ReplicaIdentity
{

  protected string $replica_identity = '';

  public function replicaIdentityDefault(): static
  {

    $this->replica_identity = "REPLICA IDENTITY DEFAULT";

    return $this;

  }

  public function replicaIdentityUsingIndex(string $index): static
  {

    $this->replica_identity = "REPLICA IDENTITY USING INDEX $index";

    return $this;

  }

  public function replicaIdentityFull(): static
  {

    $this->replica_identity = "REPLICA IDENTITY FULL";

    return $this;

  }

  public function replicaIdentityNothing(): static
  {

    $this->replica_identity = "REPLICA IDENTITY NOTHING";

    return $this;

  }

  protected function getReplicaIdentity(): string
  {
    return $this->replica_identity;
  }

}