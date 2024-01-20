<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Constraint
{

  protected array $constraint = [];

  public function constraint(string|HasBindings|array $constraint): static
  {

    $constraints = is_array($constraint) ? $constraint : [$constraint];

    foreach ($constraints as $constraint)
    {
      $this->constraint[] = $constraint;
    }

    return $this;

  }

  protected function getConstraint(): string
  {

    if (empty($this->constraint))
    {
      return '';
    }

    $constraint = implode(', ', $this->constraint);

    foreach ($this->constraint as $c)
    {

      if ($c instanceof HasBindings)
      {
        $this->mergeBindings($c);
      }

    }

    return $constraint;

  }

}