<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OwnedBy
{

  protected array $owned_by = [];

  public function ownedBy(string|array $role): static
  {

    foreach ((array) $role as $r)
    {
      $this->owned_by[] = $r;
    }

    return $this;

  }

  protected function getOwnedBy(): string
  {

    if (empty($this->owned_by))
    {
      return '';
    }

    $owned_by = implode(', ', $this->owned_by);

    return "OWNED BY $owned_by";

  }

}