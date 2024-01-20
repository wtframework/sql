<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait CharacterSet
{

  protected string $character_set = '';

  public function characterSet(string $character_set): static
  {

    $this->character_set = "CHARACTER SET $character_set";

    return $this;

  }

  protected function getCharacterSet(): string
  {
    return $this->character_set;
  }

}