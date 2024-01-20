<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Tablespace
{

  protected string $tablespace = '';

  public function tablespace(string $name): static
  {

    $this->tablespace = "TABLESPACE $name";

    return $this;

  }

  protected function getTablespace(): string
  {
    return $this->tablespace;
  }

}