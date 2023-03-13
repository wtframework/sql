<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Engine
{

  protected string $engine = '';

  public function engine(string $name): static
  {

    $this->engine = "ENGINE $name";

    return $this;

  }

  protected function getEngine(): string
  {
    return $this->engine;
  }

}