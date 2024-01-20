<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Outfile;

trait IntoOutfile
{

  protected string $into_outfile = '';

  public function intoOutfile(string|Outfile $path): static
  {

    if (is_string($path))
    {
      $path = "'" . str_replace("'", "''", $path) . "'";
    }

    $this->into_outfile = "INTO OUTFILE $path";

    return $this;

  }

  protected function getIntoOutfile(): string
  {
    return $this->into_outfile;
  }

}