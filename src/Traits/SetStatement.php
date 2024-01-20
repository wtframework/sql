<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SetStatement
{

  protected array $set_statement = [];

  public function setStatement(
    string|array $variable,
    int|string $value = null
  ): static
  {

    if (is_array($variable))
    {
      return $this->arraySetStatement($variable);
    }

    $this->set_statement[] = "$variable = $value";

    return $this;

  }

  protected function arraySetStatement(array $variables): static
  {

    foreach ($variables as $variable => $value)
    {

      $this->setStatement(
        variable: $variable,
        value: $value
      );

    }

    return $this;

  }

  protected function getSetStatement(): string
  {

    if (empty($this->set_statement))
    {
      return '';
    }

    $set_statement = implode(', ', $this->set_statement);

    return "SET STATEMENT $set_statement FOR";

  }

}