<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait WithoutRowID
{

  protected string $without_row_id = '';

  public function withoutRowID(): static
  {

    $this->without_row_id = 'WITHOUT ROWID';

    return $this;

  }

  protected function getWithoutRowID(): string
  {
    return $this->without_row_id;
  }

}