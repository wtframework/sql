<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SubpartitionBy
{

  protected string $subpartition_by = '';

  public function subpartitionByHash(string $expression): static
  {

    $this->subpartition_by = "SUBPARTITION BY HASH($expression)";

    return $this;

  }

  public function subpartitionByLinearHash(string $expression): static
  {

    $this->subpartition_by = "SUBPARTITION BY LINEAR HASH($expression)";

    return $this;

  }

  public function subpartitionByKey(string|array $column): static
  {

    $column = implode(', ', (array) $column);

    $this->subpartition_by = "SUBPARTITION BY KEY($column)";

    return $this;

  }

  public function subpartitionByLinearKey(string|array $column): static
  {

    $column = implode(', ', (array) $column);

    $this->subpartition_by = "SUBPARTITION BY LINEAR KEY($column)";

    return $this;

  }

  protected function getSubpartitionBy(): string
  {
    return $this->subpartition_by;
  }

}