<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Column;
use WTFramework\SQL\Interfaces\HasBindings;

trait Change
{

  protected array $change = [];

  public function change(
    string $current,
    string|HasBindings $new,
    \Closure $definition = null
  ): static
  {

    if (null !== $definition)
    {

      $definition($new = new Column(
        dbms: $this->dbms,
        name: $new
      ));

    }

    $this->change[] = [$current, $new];

    return $this;

  }

  protected function getChange(): string
  {

    if (empty($this->change))
    {
      return '';
    }

    foreach ($this->change as [$current, $column])
    {

      $change[] = "CHANGE COLUMN $current $column";

      if ($column instanceof HasBindings)
      {
        $this->mergeBindings(from: $column);
      }

    }

    return implode(', ', $change);

  }

}