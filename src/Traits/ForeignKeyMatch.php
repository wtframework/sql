<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ForeignKeyMatch
{

  protected string $match = '';

  public function matchSimple(): static
  {

    $this->match = 'MATCH SIMPLE';

    return $this;

  }

  public function matchFull(): static
  {

    $this->match = 'MATCH FULL';

    return $this;

  }

  protected function getMatch(): string
  {
    return $this->match;
  }

}