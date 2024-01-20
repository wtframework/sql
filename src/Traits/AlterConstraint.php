<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AlterConstraint
{

  protected array $alter_constraint = [];

  protected function alterConstraint(
    string|array $constraint,
    string $suffix
  ): static
  {

    foreach ((array) $constraint as $c)
    {
      $this->alter_constraint[] = "ALTER CONSTRAINT $c $suffix";
    }

    return $this;

  }

  public function constraintEnforced(string|array $constraint): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'ENFORCED'
    );

  }

  public function constraintNotEnforced(string|array $constraint): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'NOT ENFORCED'
    );

  }

  public function constraintDeferrable(
    string|array $constraint
  ): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'DEFERRABLE'
    );

  }

  public function constraintDeferrableDeferred(
    string|array $constraint
  ): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'DEFERRABLE INITIALLY DEFERRED'
    );

  }

  public function constraintDeferrableImmediate(
    string|array $constraint
  ): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'DEFERRABLE INITIALLY IMMEDIATE'
    );

  }

  public function constraintNotDeferrable(string|array $constraint): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'NOT DEFERRABLE'
    );

  }

  public function constraintNotDeferrableDeferred(
    string|array $constraint
  ): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'NOT DEFERRABLE INITIALLY DEFERRED'
    );

  }

  public function constraintNotDeferrableImmediate(
    string|array $constraint
  ): static
  {

    return $this->alterConstraint(
      constraint: $constraint,
      suffix: 'NOT DEFERRABLE INITIALLY IMMEDIATE'
    );

  }

  protected function getAlterConstraint(): string
  {
    return implode(', ', $this->alter_constraint);
  }

}