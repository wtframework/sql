<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Except
{

  protected array $except = [];

  public function except(
    string|HasBindings|array $stmt,
    bool $all = false
  ): static
  {

    $stmts = is_array($stmt) ? $stmt : [$stmt];

    foreach ($stmts as $stmt)
    {
      $this->except[] = [$all ? 'EXCEPT ALL' : 'EXCEPT', $stmt];
    }

    return $this;

  }

  public function exceptAll(string|HasBindings|array $stmt): static
  {

    return $this->except(
      stmt: $stmt,
      all: true
    );

  }

  protected function getExcept(): string
  {

    if (empty($this->except))
    {
      return '';
    }

    foreach ($this->except as [$type, $stmt])
    {

      $except[] = "$type $stmt";

      if ($stmt instanceof HasBindings)
      {
        $this->mergeBindings(from: $stmt);
      }

    }

    return implode(' ', $except);

  }

}