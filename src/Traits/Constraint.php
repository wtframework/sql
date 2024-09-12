<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Constraint as ServicesConstraint;

trait Constraint
{

  protected array $constraint = [];

  public function constraint(string $name = ''): ServicesConstraint
  {

    $this->constraint[] = $constraint = new ServicesConstraint($name);

    return $constraint;

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
      $this->mergeBindings($c);
    }

    return $constraint;

  }

}