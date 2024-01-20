<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Column
{

  protected array $column = [];

  public function column(string|array $column): static
  {

    foreach ((array) $column as $c)
    {
      $this->column[] = $c;
    }

    return $this;

  }

  protected function getColumn(): string
  {

    if (empty($this->column))
    {
      return '';
    }

    $column = implode(', ', $this->column);

    return "($column)";

  }

}