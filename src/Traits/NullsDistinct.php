<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait NullsDistinct
{

  protected string $nulls_distinct = '';

  public function nullsDistinct(): static
  {

    $this->nulls_distinct = 'NULLS DISTINCT';

    return $this;

  }

  public function nullsNotDistinct(): static
  {

    $this->nulls_distinct = 'NULLS NOT DISTINCT';

    return $this;

  }

  protected function getNullsDistinct(): string
  {
    return $this->nulls_distinct;
  }

}