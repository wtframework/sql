<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait NotOf
{

  protected string $not_of = '';

  public function notOf(): static
  {

    $this->not_of = 'NOT OF';

    return $this;

  }

  protected function getNotOf(): string
  {
    return $this->not_of;
  }

}