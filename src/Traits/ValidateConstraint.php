<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ValidateConstraint
{

  protected array $validate_constraint = [];

  public function validateConstraint(string|array $constraint): static
  {

    foreach ((array) $constraint as $c)
    {
      $this->validate_constraint[] = "VALIDATE CONSTRAINT $c";
    }

    return $this;

  }

  protected function getValidateConstraint(): string
  {
    return implode(', ', $this->validate_constraint);
  }

}