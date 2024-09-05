<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Identity
{

  protected string $identity = '';

  public function identity(int $seed = 1, int $increment = 1): static
  {

    $this->identity = "IDENTITY ($seed, $increment)";

    return $this;

  }

  protected function getIdentity(): string
  {
    return $this->identity;
  }

}