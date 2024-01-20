<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait SetOperation
{

  protected array $set_operation = [];

  protected function setOperation(
    string|HasBindings|array $stmt,
    string $type
  ): static
  {

    $stmts = is_array($stmt) ? $stmt : [$stmt];

    foreach ($stmts as $stmt)
    {
      $this->set_operation[] = [$type, $stmt];
    }

    return $this;

  }

  public function union(string|HasBindings|array $stmt): static
  {

    return $this->setOperation(
      stmt: $stmt,
      type: 'UNION'
    );

  }

  public function unionAll(string|HasBindings|array $stmt): static
  {

    return $this->setOperation(
      stmt: $stmt,
      type: 'UNION ALL'
    );

  }

  public function intersect(string|HasBindings|array $stmt): static
  {

    return $this->setOperation(
      stmt: $stmt,
      type: 'INTERSECT'
    );

  }

  public function intersectAll(string|HasBindings|array $stmt): static
  {

    return $this->setOperation(
      stmt: $stmt,
      type: 'INTERSECT ALL'
    );

  }

  public function except(string|HasBindings|array $stmt): static
  {

    return $this->setOperation(
      stmt: $stmt,
      type: 'EXCEPT'
    );

  }

  public function exceptAll(string|HasBindings|array $stmt): static
  {

    return $this->setOperation(
      stmt: $stmt,
      type: 'EXCEPT ALL'
    );

  }

  protected function getSetOperation(): string
  {

    if (empty($this->set_operation))
    {
      return '';
    }

    foreach ($this->set_operation as [$type, $stmt])
    {

      $set_operation[] = "$type $stmt";

      if ($stmt instanceof HasBindings)
      {
        $this->mergeBindings($stmt);
      }

    }

    return implode(' ', $set_operation);

  }

}