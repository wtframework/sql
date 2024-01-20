<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SecondaryEngineAttribute
{

  protected string $secondary_engine_attribute = '';

  public function secondaryEngineAttribute(string $secondary_engine_attribute): static
  {

    $secondary_engine_attribute = str_replace(
      "'",
      "''",
      $secondary_engine_attribute
    );

    $this->secondary_engine_attribute
      = "SECONDARY_ENGINE_ATTRIBUTE '$secondary_engine_attribute'";

    return $this;

  }

  protected function getSecondaryEngineAttribute(): string
  {
    return $this->secondary_engine_attribute;
  }

}