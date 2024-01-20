<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Format
{

  protected string $format = '';

  public function formatFixed(): static
  {

    $this->format = 'COLUMN_FORMAT FIXED';

    return $this;

  }

  public function formatDynamic(): static
  {

    $this->format = 'COLUMN_FORMAT DYNAMIC';

    return $this;

  }

  public function formatDefault(): static
  {

    $this->format = 'COLUMN_FORMAT DEFAULT';

    return $this;

  }

  protected function getFormat(): string
  {
    return $this->format;
  }

}