<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Table;

trait Into
{

  protected string $into = '';

  public function into(string|Table $table): static
  {

    $this->into = "INTO $table";

    return $this;

  }

  protected function getInto(): string
  {
    return $this->into;
  }

}