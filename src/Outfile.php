<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Traits\Charset;
use WTFramework\SQL\Traits\Fields;
use WTFramework\SQL\Traits\Lines;

class Outfile
{

  use Charset;
  use Fields;
  use Lines;

  public function __construct(public readonly string $path) {}

  public function __toString(): string
  {

    return implode(' ', array_filter([
      "'$this->path'",
      $this->getCharset(),
      $this->getFields(),
      $this->getLines()
    ]));

  }

}