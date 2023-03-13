<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RenameTo
{

  protected string $rename_to = '';

  public function renameTo(string $name): static
  {

    $this->rename_to = "RENAME TO $name";

    return $this;

  }

  protected function getRenameTo(): string
  {
    return $this->rename_to;
  }

}