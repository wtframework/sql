<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait Union
{

  protected array $union = [];

  public function union(
    string|HasBindings|array $stmt,
    bool $all = false
  ): static
  {

    $stmts = is_array($stmt) ? $stmt : [$stmt];

    foreach ($stmts as $stmt)
    {
      $this->union[] = [$all ? 'UNION ALL' : 'UNION', $stmt];
    }

    return $this;

  }

  public function unionAll(string|HasBindings|array $stmt): static
  {

    return $this->union(
      stmt: $stmt,
      all: true
    );

  }

  protected function getUnion(): string
  {

    if (empty($this->union))
    {
      return '';
    }

    foreach ($this->union as [$type, $stmt])
    {

      $union[] = "$type $stmt";

      if ($stmt instanceof HasBindings)
      {
        $this->mergeBindings(from: $stmt);
      }

    }

    return implode(' ', $union);

  }

}