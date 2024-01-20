<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ColumnPrimaryKey
{

  protected string $primary_key = '';

  public function primaryKey(): static
  {

    $this->primary_key = 'PRIMARY KEY';

    return $this;

  }

  public function primaryKeyDesc(): static
  {

    $this->primary_key = 'PRIMARY KEY DESC';

    return $this;

  }

  protected function getPrimaryKey(): string
  {
    return $this->primary_key;
  }

}