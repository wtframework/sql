<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait EngineAttribute
{

  protected string $engine_attribute = '';

  public function engineAttribute(string $engine_attribute): static
  {

    $engine_attribute = str_replace("'", "''", $engine_attribute);

    $this->engine_attribute = "ENGINE_ATTRIBUTE '$engine_attribute'";

    return $this;

  }

  protected function getEngineAttribute(): string
  {
    return $this->engine_attribute;
  }

}