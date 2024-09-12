<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Outfile;
use WTFramework\SQL\SQL;

trait IntoOutfile
{

  protected string $into_outfile = '';

  public function intoOutfile(string|Outfile $path): static
  {

    if (is_string($path))
    {
      $path = "'" . SQL::escape($path) . "'";
    }

    $this->into_outfile = "INTO OUTFILE $path";

    return $this;

  }

  protected function getIntoOutfile(): string
  {
    return $this->into_outfile;
  }

}