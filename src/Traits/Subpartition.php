<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Subpartition
{

  protected array $subpartition = [];

  public function subpartition(string|HasBindings|array $subpartition): static
  {

    foreach ((array) $subpartition as $s)
    {
      $this->subpartition[] = $s;
    }

    return $this;

  }

  protected function getSubpartition(): string
  {

    if (empty($this->subpartition))
    {
      return '';
    }

    $subpartition = implode(', ', $this->subpartition);

    return "($subpartition)";

  }

}