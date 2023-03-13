<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait After
{

  protected string $after = '';

  public function after(string $column): static
  {

    $this->after = "AFTER $column";

    return $this;

  }

  protected function getAfter(): string
  {
    return $this->after;
  }

}