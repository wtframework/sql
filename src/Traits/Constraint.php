<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Constraint as SQLConstraint;
use WTFramework\SQL\Interfaces\HasBindings;

trait Constraint
{

  protected array $constraint = [];

  public function constraint(
    string|HasBindings|\Closure|array $constraint,
    string $name = null
  ): static
  {

    $constraints = is_array($constraint) ? $constraint : [$constraint];

    foreach ($constraints as $key => $constraint)
    {

      if ($constraint instanceof \Closure)
      {

        $constraint($constraint = new SQLConstraint(
          dbms: $this->dbms,
          name: is_string($key) ? $key : $name
        ));

      }

      $this->constraint[] = $constraint;

    }

    return $this;

  }

  protected function getConstraint(string $separator): string
  {

    if (empty($this->constraint))
    {
      return '';
    }

    $constraint = implode($separator, $this->constraint);

    foreach ($this->constraint as $c)
    {

      if ($c instanceof HasBindings)
      {
        $this->mergeBindings(from: $c);
      }

    }

    return $constraint;

  }

}