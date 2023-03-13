<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Procedure
{

  protected string $procedure = '';
  protected array $arguments = [];

  public function procedure(
    string $procedure,
    mixed $arguments = []
  ): static
  {

    $this->procedure = $procedure;

    $arguments = is_array($arguments) ? $arguments : [$arguments];

    foreach ($arguments as $argument)
    {
      $this->arguments[] = $argument;
    }

    return $this;

  }

  protected function getProcedure(): string
  {

    if ('' === $this->procedure)
    {
      return '';
    }

    $arguments = implode(', ', $this->arguments);

    return "PROCEDURE $this->procedure ($arguments)";

  }

}