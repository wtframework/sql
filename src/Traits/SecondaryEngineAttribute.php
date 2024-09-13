<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\SQL;

trait SecondaryEngineAttribute
{

  protected string $secondary_engine_attribute = '';

  public function secondaryEngineAttribute(string $secondary_engine_attribute): static
  {

    $secondary_engine_attribute = SQL::escape($secondary_engine_attribute);

    $this->secondary_engine_attribute
      = "SECONDARY_ENGINE_ATTRIBUTE = '$secondary_engine_attribute'";

    return $this;

  }

  protected function getSecondaryEngineAttribute(): string
  {
    return $this->secondary_engine_attribute;
  }

}