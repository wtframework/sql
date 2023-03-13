<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SetTablespace
{

  protected string $set_tablespace = '';

  public function setTablespace(string $name): static
  {

    $this->set_tablespace = "SET TABLESPACE $name";

    return $this;

  }

  public function setTablespaceNoWait(string $name): static
  {

    $this->set_tablespace = "SET TABLESPACE $name NOWAIT";

    return $this;

  }

  protected function getSetTablespace(): string
  {
    return $this->set_tablespace;
  }

}