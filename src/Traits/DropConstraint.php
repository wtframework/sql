<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DropConstraint
{

  protected array $drop_constraint = [];

  public function dropConstraint(
    string|array $constraint,
    bool $if_exists = false,
    bool $cascade = false
  ): static
  {

    $if_exists = $if_exists ? ' IF EXISTS' : '';
    $cascade = $cascade ? ' CASCADE' : '';

    foreach ((array) $constraint as $c)
    {
      $this->drop_constraint[] = "DROP CONSTRAINT$if_exists $c$cascade";
    }

    return $this;

  }

  public function dropConstraintIfExists(string|array $constraint): static
  {

    return $this->dropConstraint(
      constraint: $constraint,
      if_exists: true
    );

  }

  public function dropConstraintCascade(string|array $constraint): static
  {

    return $this->dropConstraint(
      constraint: $constraint,
      cascade: true
    );

  }

  public function dropConstraintIfExistsCascade(string|array $constraint): static
  {

    return $this->dropConstraint(
      constraint: $constraint,
      if_exists: true,
      cascade: true
    );

  }

  protected function getDropConstraint(): string
  {
    return implode(', ', $this->drop_constraint);
  }

}