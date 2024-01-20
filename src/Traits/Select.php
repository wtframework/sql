<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Select
{

  protected string|HasBindings $select = '';

  public function select(string|HasBindings $stmt): static
  {

    $this->select = $stmt;

    return $this;

  }

  protected function getSelect(): string
  {

    $select = (string) $this->select;

    if ($this->select instanceof HasBindings)
    {
      $this->mergeBindings($this->select);
    }

    return $select;

  }

}