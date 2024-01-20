<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OwnerTo
{

  protected string $owner_to = '';

  public function ownerTo(string $owner): static
  {

    $this->owner_to = "OWNER TO $owner";

    return $this;

  }

  public function ownerToCurrentRole(): static
  {

    $this->owner_to = "OWNER TO CURRENT_ROLE";

    return $this;

  }

  public function ownerToCurrentUser(): static
  {

    $this->owner_to = "OWNER TO CURRENT_USER";

    return $this;

  }

  public function ownerToSessionUser(): static
  {

    $this->owner_to = "OWNER TO SESSION_USER";

    return $this;

  }

  protected function getOwnerTo(): string
  {
    return $this->owner_to;
  }

}