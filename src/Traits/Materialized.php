<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Materialized
{

  protected string $materialized = '';

  public function materialized(): static
  {

    $this->materialized = 'MATERIALIZED';

    return $this;

  }

  public function notMaterialized(): static
  {

    $this->materialized = 'NOT MATERIALIZED';

    return $this;

  }

  protected function getMaterialized(): string
  {
    return $this->materialized;
  }

}