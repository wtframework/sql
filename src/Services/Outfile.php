<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Traits\CharacterSet;
use WTFramework\SQL\Traits\Fields;
use WTFramework\SQL\Traits\Lines;

class Outfile
{

  use CharacterSet;
  use Fields;
  use Lines;

  public function __construct(public readonly string $path) {}

  protected function getPath(): string
  {

    $path = str_replace("'", "''", $this->path);

    return "'$path'";

  }

  protected function toArray(): array
  {

    return [
      $this->getPath(),
      $this->getCharacterSet(),
      $this->getFields(),
      $this->getLines(),
    ];

  }

  public function __toString(): string
  {
    return implode(' ', array_filter($this->toArray()));
  }

}