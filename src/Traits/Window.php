<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Window
{

  protected array $window = [];

  public function window(
    string|array $name,
    string|HasBindings $spec = null
  ): static
  {

    if (is_array($name))
    {
      return $this->arrayWindow($name);
    }

    $this->window[] = [$name, $spec];

    return $this;

  }

  protected function arrayWindow(array $windows): static
  {

    foreach ($windows as $name => $spec)
    {

      $this->window(
        name: $name,
        spec: $spec
      );

    }

    return $this;

  }

  protected function getWindow(): string
  {

    if (empty($this->window))
    {
      return '';
    }

    foreach ($this->window as [$name, $spec])
    {

      $window[] = "$name AS ($spec)";

      if ($spec instanceof HasBindings)
      {
        $this->mergeBindings($spec);
      }

    }

    $window = implode(', ', $window);

    return "WINDOW $window";

  }

}