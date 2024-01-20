<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait UsingIndexTablespace
{

  protected string $using_index_tablespace = '';

  public function usingIndexTablespace(string $tablespace): static
  {

    $this->using_index_tablespace = "USING INDEX TABLESPACE $tablespace";

    return $this;

  }

  protected function getUsingIndexTablespace(): string
  {
    return $this->using_index_tablespace;
  }

}