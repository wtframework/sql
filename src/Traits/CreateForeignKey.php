<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\ForeignKey;

trait CreateForeignKey
{

  protected array $foreign_key = [];

  public function foreignKey(string|array $column): ForeignKey
  {

    $this->foreign_key[] = $foreign_key = new ForeignKey($column);

    return $foreign_key;

  }

  protected function getForeignKey(): string
  {

    if (empty($this->foreign_key))
    {
      return '';
    }

    $foreign_key = implode(', ', $this->foreign_key);

    foreach ($this->foreign_key as $c)
    {
      $this->mergeBindings($c);
    }

    return $foreign_key;

  }

}