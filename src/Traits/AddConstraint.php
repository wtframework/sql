<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait AddConstraint
{

  protected array $add_constraint = [];

  public function addConstraint(string|HasBindings|array $constraint): static
  {

    $constraints = is_array($constraint) ? $constraint : [$constraint];

    foreach ($constraints as $constraint)
    {
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

      $add_constraint[] = "ADD CONSTRAINT $constraint";

      if ($constraint instanceof HasBindings)
      {
        $this->mergeBindings($constraint);
      }

    }

    return implode(', ', $add_constraint);

  }

}