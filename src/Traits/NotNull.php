<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait NotNull
{

  protected string $not_null = '';

  public function notNull(): static
  {

    $this->not_null = 'NOT NULL';

    return $this;

  }

  protected function getNotNull(): string
  {
    return $this->not_null;
  }

}