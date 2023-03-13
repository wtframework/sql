<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait WithNoData
{

  protected string $with_no_data = '';

  public function withNoData(): static
  {

    $this->with_no_data = 'WITH NO DATA';

    return $this;

  }

  protected function getWithNoData(): string
  {
    return $this->with_no_data;
  }

}