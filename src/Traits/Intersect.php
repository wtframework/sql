<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Intersect
{

  protected array $intersect = [];

  public function intersect(
    string|HasBindings|array $stmt,
    bool $all = false
  ): static
  {

    $stmts = is_array($stmt) ? $stmt : [$stmt];

    foreach ($stmts as $stmt)
    {
      $this->intersect[] = [$all ? 'INTERSECT ALL' : 'INTERSECT', $stmt];
    }

    return $this;

  }

  public function intersectAll(string|HasBindings|array $stmt): static
  {

    return $this->intersect(
      stmt: $stmt,
      all: true
    );

  }

  protected function getIntersect(): string
  {

    if (empty($this->intersect))
    {
      return '';
    }

    foreach ($this->intersect as [$type, $stmt])
    {

      $intersect[] = "$type $stmt";

      if ($stmt instanceof HasBindings)
      {
        $this->mergeBindings(from: $stmt);
      }

    }

    return implode(' ', $intersect);

  }

}