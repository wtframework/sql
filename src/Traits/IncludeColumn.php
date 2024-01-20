<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IncludeColumn
{

  protected array $include = [];

  public function include(string|array $column): static
  {

    foreach ((array) $column as $c)
    {
      $this->include[] = $c;
    }

    return $this;

  }

  protected function getInclude(): string
  {

    if (empty($this->include))
    {
      return '';
    }

    $include = implode(', ', $this->include);

    return "INCLUDE ($include)";

  }

}