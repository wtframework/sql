<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ForeignKey
{

  protected string $foreign_key = '';

  public function foreignKey(): static
  {

    $this->foreign_key = 'FOREIGN KEY';

    return $this;

  }

  protected function getForeignKey(): string
  {
    return $this->foreign_key;
  }

}