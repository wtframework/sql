<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OnUpdateCurrentTimestamp
{

  protected string $current_timestamp = '';
  protected string $current_timestamp_precision = '';

  public function onUpdateCurrentTimestamp(int $precision = null): static
  {

    $this->current_timestamp = "ON UPDATE CURRENT_TIMESTAMP";

    if (null !== $precision)
    {
      $this->current_timestamp_precision = " ($precision)";
    }

    return $this;

  }

  protected function getOnUpdateCurrentTimestamp(): string
  {
    return "$this->current_timestamp$this->current_timestamp_precision";
  }

}