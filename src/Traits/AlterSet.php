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
      return $this->arraySet($parameter);
    }

    $value = null === $value ? '' : " = $value";

    $this->alter_set[] = "$parameter$value";

    return $this;

  }

  protected function arraySet(array $parameters): static
  {

    foreach ($parameters as $parameter => $value)
    {

      $this->set(
        parameter: is_int($parameter) ? $value : $parameter,
        value: is_int($parameter) ? null : $value
      );

    }

    return $this;

  }

  public function getSet(): string
  {

    if (empty($this->alter_set))
    {
      return '';
    }

    $alter_set = implode(', ', $this->alter_set);

    return "SET ($alter_set)";

  }

}