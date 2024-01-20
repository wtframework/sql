<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ImportTablespace
{

  protected string $import_tablespace = '';

  public function importTablespace(): static
  {

    $this->import_tablespace = 'IMPORT TABLESPACE';

    return $this;

  }

  public function discardTablespace(): static
  {

    $this->import_tablespace = 'DISCARD TABLESPACE';

    return $this;

  }

  protected function getImportTablespace(): string
  {
    return $this->import_tablespace;
  }

}