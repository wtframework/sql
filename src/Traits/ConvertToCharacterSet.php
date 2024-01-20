<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ConvertToCharacterSet
{

  protected string $convert_to_character_set = '';

  public function convertToCharacterSet(
    string $character_set,
    string $collation = null
  ): static
  {

    $collation = null === $collation ? '' : " COLLATE $collation";

    $this->convert_to_character_set
      = "CONVERT TO CHARACTER SET $character_set$collation";

    return $this;

  }

  protected function getConvertToCharacterSet(): string
  {
    return $this->convert_to_character_set;
  }

}