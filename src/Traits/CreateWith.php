<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait CreateWith
{

  protected array $create_with = [];

  public function with(
    string|array $parameter,
    mixed $value = null
  ): static
  {

    if (is_array($parameter))
    {
      return $this->arrayWith(parameters: $parameter);
    }

    $value = $this->value(value: $value);

    $this->create_with[] = "$parameter$value";

    return $this;

  }

  protected function arrayWith(array $parameters): static
  {

    foreach ($parameters as $parameter => $value)
    {

      $this->with(
        parameter: $parameter,
        value: $value
      );

    }

    return $this;

  }

  protected function value(mixed $value): string
  {

    return match ($value)
    {
      null => '',
      true => "=TRUE",
      false => "=FALSE",
      default => "=$value",
    };

  }

  public function getCreateWith(): string
  {

    if (empty($this->create_with))
    {
      return '';
    }

    $create_with = implode(', ', $this->create_with);

    return "WITH ($create_with)";

  }

}