<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait NotValid
{

  protected string $not_valid = '';

  public function notValid(): static
  {

    $this->not_valid = 'NOT VALID';

    return $this;

  }

  protected function getNotValid(): string
  {
    return $this->not_valid;
  }

}