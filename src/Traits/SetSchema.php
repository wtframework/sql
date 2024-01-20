<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SetSchema
{

  protected string $set_schema = '';

  public function setSchema(string $schema): static
  {

    $this->set_schema = "SET SCHEMA $schema";

    return $this;

  }

  protected function getSetSchema(): string
  {
    return $this->set_schema;
  }

}