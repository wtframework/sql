<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait NoInherit
{

  protected string $no_inherit = '';

  public function noInherit(): static
  {

    $this->no_inherit = 'NO INHERIT';

    return $this;

  }

  protected function getNoInherit(): string
  {
    return $this->no_inherit;
  }

}