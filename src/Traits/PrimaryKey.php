<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait PrimaryKey
{

  protected array $primary_key = [];

  public function primaryKey(string|array $column): static
  {

    foreach ((array) $column as $c)
    {
      $this->primary_key[] = $c;
    }

    return $this;

  }

  protected function getPrimaryKey(): string
  {

    if (empty($this->primary_key))
    {
      return '';
    }

    $primary_key = implode(', ', $this->primary_key);

    return "PRIMARY KEY ($primary_key)";

  }

}