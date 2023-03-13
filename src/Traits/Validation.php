<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Validation
{

  protected string $validation = '';

  public function withValidation(): static
  {

    $this->validation = 'WITH VALIDATION';

    return $this;

  }

  public function withoutValidation(): static
  {

    $this->validation = 'WITHOUT VALIDATION';

    return $this;

  }

  protected function getValidation(): string
  {
    return $this->validation;
  }

}