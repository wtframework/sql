<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait With
{

  protected array $with = [];
  protected string $recursive = '';

  public function with(string|HasBindings|array $cte): static
  {

    $ctes = is_array($cte) ? $cte : [$cte];

    foreach ($ctes as $cte)
    {
      $this->with[] = $cte;
    }

    return $this;

  }

  public function withRecursive(string|HasBindings|array $cte): static
  {

    $this->recursive = ' RECURSIVE';

    return $this->with($cte);

  }

  protected function getWith(): string
  {

    if (empty($this->with))
    {
      return '';
    }

    $with = implode(', ', $this->with);

    foreach ($this->with as $cte)
    {

      if ($cte instanceof HasBindings)
      {
        $this->mergeBindings($cte);
      }

    }

    return "WITH$this->recursive $with";

  }

}