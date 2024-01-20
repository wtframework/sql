<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait OnTable
{

  protected string $on_table = '';

  public function on(string|HasBindings $table): static
  {

    $this->on_table = "ON $table";

    return $this;

  }

  protected function getOn(): string
  {
    return $this->on_table;
  }

}