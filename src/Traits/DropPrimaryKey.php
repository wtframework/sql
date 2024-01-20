<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DropPrimaryKey
{

  protected string $drop_primary_key = '';

  public function dropPrimaryKey(): static
  {

    $this->drop_primary_key = 'DROP PRIMARY KEY';

    return $this;

  }

  protected function getDropPrimaryKey(): string
  {
    return $this->drop_primary_key;
  }

}