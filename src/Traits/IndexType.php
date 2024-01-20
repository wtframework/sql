<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IndexType
{

  protected string $index_type = '';

  public function using(string $method): static
  {

    $this->index_type = "USING $method";

    return $this;

  }

  protected function getUsing(): string
  {
    return $this->index_type;
  }

}