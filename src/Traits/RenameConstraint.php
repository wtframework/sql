<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RenameConstraint
{

  protected string $rename_constraint = '';

  public function renameConstraint(
    string $constraint,
    string $name = null
  ): static
  {

    $this->rename_constraint = "RENAME CONSTRAINT $constraint TO $name";

    return $this;

  }

  protected function getRenameConstraint(): string
  {
    return $this->rename_constraint;
  }

}