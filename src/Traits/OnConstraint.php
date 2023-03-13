<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OnConstraint
{

  protected string $on_constraint = '';

  public function onConstraint(string $constraint): static
  {

    $this->on_constraint = "ON CONSTRAINT $constraint";

    return $this;

  }

  protected function getOnConstraint(): string
  {
    return $this->on_constraint;
  }

}