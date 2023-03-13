<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AlterSet
{

  protected array $alter_set = [];

  public function set(
    string|array $parameter,
    mixed $value = null
  ): static
  {

    if (is_array($parameter))
    {
      return $this->arraySet(parameters: $parameter);
    }

    $value = $this->value(value: $value);

    $this->alter_set[] = "$parameter$value";

    return $this;

  }

  protected function arraySet(array $parameters): static
  {

    foreach ($parameters as $parameter => $value)
    {

      $this->set(
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

  public function getAlterSet(): string
  {

    if (empty($this->alter_set))
    {
      return '';
    }

    $alter_set = implode(', ', $this->alter_set);

    return "SET ($alter_set)";

  }

}