<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait CycleRestrict
{

  protected array $cycle_restrict = [];

  public function cycleRestrict(string|array $column): static
  {

    foreach ((array) $column as $c)
    {
      $this->cycle_restrict[] = $c;
    }

    return $this;

  }

  protected function getCycleRestrict(): string
  {

    if (empty($this->cycle_restrict))
    {
      return '';
    }

    $cycle_restrict = implode(', ', $this->cycle_restrict);

    return "CYCLE $cycle_restrict RESTRICT";

  }

}