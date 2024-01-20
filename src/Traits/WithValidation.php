<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait WithValidation
{

  protected string $with_validation = '';

  public function withValidation(): static
  {

    $this->with_validation = 'WITH VALIDATION';

    return $this;

  }

  public function withoutValidation(): static
  {

    $this->with_validation = 'WITHOUT VALIDATION';

    return $this;

  }

  protected function getWithValidation(): string
  {
    return $this->with_validation;
  }

}