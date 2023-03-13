<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Of
{

  protected string $of = '';

  public function of(string $type): static
  {

    $this->of = "OF $type";

    return $this;

  }

  protected function getOf(): string
  {
    return $this->of;
  }

}