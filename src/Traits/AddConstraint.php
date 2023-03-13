<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Constraint;
use WTFramework\SQL\Interfaces\HasBindings;

trait AddConstraint
{

  protected array $add_constraint = [];

  public function addConstraint(
    string|HasBindings|\Closure|array $constraint,
    string $name = null
  ): static
  {

    $constraints = is_array($constraint) ? $constraint : [$constraint];

    foreach ($constraints as $key => $constraint)
    {

      if ($constraint instanceof \Closure)
      {

        $constraint($constraint = new Constraint(
          dbms: $this->dbms,
          name: is_string($key) ? $key : $name
        ));

      }

      $this->add_constraint[] = $constraint;

    }

    return $this;

  }

  protected function getAddConstraint(): string
  {

    if (empty($this->add_constraint))
    {
      return '';
    }

    foreach ($this->add_constraint as $constraint)
    {

      $add_constraint[] = "ADD $constraint";

      if ($constraint instanceof HasBindings)
      {
        $this->mergeBindings(from: $constraint);
      }

    }

    return implode(', ', $add_constraint);

  }

}