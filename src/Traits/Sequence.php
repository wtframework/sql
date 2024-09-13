<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Sequence
{

  protected string $sequence = '';

  public function sequence(bool $value = true): static
  {

    $value = (int) $value;

    $this->sequence = "SEQUENCE = $value";

    return $this;

  }

  protected function getSequence(): string
  {
    return $this->sequence;
  }

}