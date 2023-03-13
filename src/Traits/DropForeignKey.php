<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DropForeignKey
{

  protected array $drop_foreign_key = [];

  public function dropForeignKey(
    string|array $foreign_key,
    bool $if_exists = false
  ): static
  {

    $if_exists = $if_exists ? ' IF EXISTS' : '';

    foreach ((array) $foreign_key as $c)
    {
      $this->drop_foreign_key[] = "DROP FOREIGN KEY$if_exists $c";
    }

    return $this;

  }

  public function dropForeignKeyIfExists(string|array $foreign_key): static
  {

    return $this->dropForeignKey(
      foreign_key: $foreign_key,
      if_exists: true
    );

  }

  protected function getDropForeignKey(): string
  {
    return implode(', ', $this->drop_foreign_key);
  }

}