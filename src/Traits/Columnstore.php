<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Columnstore
{

  protected string $columnstore = '';

  public function columnstore(): static
  {

    $this->columnstore = 'COLUMNSTORE';

    return $this;

  }

  protected function getColumnstore(): string
  {
    return $this->columnstore;
  }

}