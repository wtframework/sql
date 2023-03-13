<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IntoVar
{

  protected array $into_var = [];

  public function intoVar(string|array $into_vars): static
  {

    foreach ((array) $into_vars as $into_var)
    {
      $this->into_var[] = "@$into_var";
    }

    return $this;

  }

  protected function getIntoVar(): string
  {

    if (empty($this->into_var))
    {
      return '';
    }

    $into_var = implode(', ', $this->into_var);

    return "INTO $into_var";

  }

}