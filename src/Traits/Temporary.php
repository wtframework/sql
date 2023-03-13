<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Temporary
{

  protected string $temporary = '';

  public function temporary(): static
  {

    $this->temporary = 'TEMPORARY';

    return $this;

  }

  protected function getTemporary(): string
  {
    return $this->temporary;
  }

}