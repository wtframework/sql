<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Constraint;

trait AddConstraint
{

  protected array $add_constraint = [];

  public function addConstraint(string $name = ''): Constraint
  {

    $this->add_constraint[] = $constraint = new Constraint($name);

    return $constraint;

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

      $this->mergeBindings($constraint);

    }

    return implode(', ', $add_constraint);

  }

}