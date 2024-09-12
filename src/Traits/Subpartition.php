<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Subpartition as ServicesSubpartition;

trait Subpartition
{

  protected array $subpartition = [];

  public function subpartition(string $name): ServicesSubpartition
  {

    $this->subpartition[] = $subpartition = new ServicesSubpartition($name);

    return $subpartition;

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