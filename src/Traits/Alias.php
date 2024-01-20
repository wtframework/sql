<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Alias
{

  protected string $alias = '';

  public function alias(string $alias): static
  {

    $this->alias = "AS $alias";

    return $this;

  }

  protected function getAlias(): string
  {
    return $this->alias;
  }

}