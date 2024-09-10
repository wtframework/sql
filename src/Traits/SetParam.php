<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SetParam
{

  protected array $set_param = [];

  public function setParam(
    string|array $parameter,
    mixed $value = null
  ): static
  {

    if (is_array($parameter))
    {
      return $this->arraySetParam($parameter);
    }

    $value = null === $value ? '' : " = $value";

    $this->set_param[] = "$parameter$value";

    return $this;

  }

  protected function arraySetParam(array $parameters): static
  {

    foreach ($parameters as $parameter => $value)
    {

      $this->setParam(
        parameter: is_int($parameter) ? $value : $parameter,
        value: is_int($parameter) ? null : $value
      );

    }

    return $this;

  }

  public function getSetParam(): string
  {

    if (empty($this->set_param))
    {
      return '';
    }

    $set_param = implode(', ', $this->set_param);

    return "SET ($set_param)";

  }

}