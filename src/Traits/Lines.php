<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\SQL;

trait Lines
{

  protected array $lines = [];

  public function linesStartingBy(string $string): static
  {

    $string = SQL::escape($string);

    $this->lines['starting_by'] = "STARTING BY '$string'";

    return $this;

  }

  public function linesTerminatedBy(string $string): static
  {

    $string = SQL::escape($string);

    $this->lines['terminated_by'] = "TERMINATED BY '$string'";

    return $this;

  }

  protected function getLines(): string
  {

    if (empty($this->lines))
    {
      return '';
    }

    $lines = implode(' ', $this->lines);

    return "LINES $lines";

  }

}