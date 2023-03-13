<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Reset
{

  protected array $reset = [];

  public function reset(string|array $parameter): static
  {

    $parameters = is_array($parameter) ? $parameter : [$parameter];

    foreach ($parameters as $parameter)
    {
      $this->reset[] = $parameter;
    }

    return $this;

  }

  protected function getReset(): string
  {

    if (empty($this->reset))
    {
      return '';
    }

    $reset = implode(', ', $this->reset);

    return "RESET ($reset)";

  }

}